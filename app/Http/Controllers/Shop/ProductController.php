<?php

namespace App\Http\Controllers\Shop;

use App\Classes\Uploader;
use App\Http\Controllers\Controller;
use App\Models\Shop\Categories;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(16);

        return view('admin.product.index', compact('products'));
    }

    public function search(Request $request)
    {
        $query = Product::query();

        if ($request->filled('title')) {
            $query->where('title', 'like', '%'.$request->title.'%')->orWhere('id', $request->title)->orWhere('code', $request->title);
        }

        $products = $query->orderBy('id', 'desc')->paginate(16);

        return view('admin.product.index', compact('products'));

    }

    public function create()
    {
        $categories = Categories::get();

        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'category_id' => 'required|integer',
            'code' => 'required|string|unique:products,code|max:15',
            'desc' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|integer',
            'off_price' => 'required|integer',
            'weight' => 'nullable|numeric',
            'commission' => 'nullable|numeric',
        ], [
            'title.required' => 'نام محصول را وارد کنید',
            'image.required' => 'عکس محصول را وارد کنید',
            'image.mimes' => 'عکس محصول باید jpeg - png - jpg - gif باشد',
            'image.max' => 'عکس محصول نباید بزرگتر از 2 مگابایت باشد',
            'category_id.integer' => 'دسته‌بندی را درست وارد کنید',
            'category_id.required' => 'دسته‌بندی را وارد کنید',
            'desc.required' => 'توضیحات را وارد کنید',
            'code.required' => 'کد محصول را وارد کنید',
            'off_price.required' => 'قیمت با تخفیف را وارد کنید',
            'off_price.integer' => 'قیمت با تخفیف را درست وارد کنید',
            'price.required' => 'قیمت را وارد کنید',
            'price.integer' => 'قیمت را درست وارد کنید',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('image')) {
            $uploader = new Uploader;
            $path = $uploader->uploadImage($request->image, 'shop/product');
        } else {
            $path = null;
        }

        $created = Product::create([
            'title' => $request->title,
            'slug' => str_replace(' ', '-', $request->title),
            'category_id' => $request->category_id,
            'desc' => $request->desc,
            'code' => $request->code,
            'off_price' => $request->off_price == null || $request->off_price == 0 ? 0 : $request->off_price,
            'price' => $request->price,
            'image' => $path,
        ]);

        if ($created) {
            return redirect()->route('admin.shop.product.index')->with('success', 'محصول ثبت شد');
        } else {
            return redirect()->back()->with('error', 'خطا در ثبت محصول٬ دوباره تلاش کنید');
        }
    }

    public function edit(Product $product)
    {
        $categories = Categories::get();

        return view('admin.product.edit', compact('categories', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'category_id' => 'required|integer',
            'code' => 'required|unique:products,code,'.$product->id.',id|max:15',
            'desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|integer',
            'off_price' => 'required|integer',
            'weight' => 'nullable|numeric',
            'commission' => 'nullable|numeric',
        ], [
            'title.required' => 'نام محصول را وارد کنید',
            'image.required' => 'عکس محصول را وارد کنید',
            'image.mimes' => 'عکس محصول باید jpeg - png - jpg - gif باشد',
            'image.max' => 'عکس محصول نباید بزرگتر از 2 مگابایت باشد',
            'category_id.integer' => 'دسته‌بندی را درست وارد کنید',
            'category_id.required' => 'دسته‌بندی را وارد کنید',
            'desc.required' => 'توضیحات را وارد کنید',
            'code.required' => 'کد محصول را وارد کنید',
            'off_price.required' => 'قیمت با تخفیف را وارد کنید',
            'off_price.integer' => 'قیمت با تخفیف را درست وارد کنید',
            'price.required' => 'قیمت را وارد کنید',
            'price.integer' => 'قیمت را درست وارد کنید',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('image')) {
            $uploader = new Uploader;
            $path = $uploader->uploadImage($request->image, 'shop/product', $product->image);
        } else {
            $path = $product->image;
        }

        $updated = $product->update([
            'title' => $request->title,
            'slug' => str_replace(' ', '-', $request->title),
            'category_id' => $request->category_id,
            'desc' => $request->desc,
            'code' => $request->code,
            'off_price' => $request->off_price == null || $request->off_price == 0 ? 0 : $request->off_price,
            'price' => $request->price,
            'image' => $path,
        ]);

        if ($updated) {
            return redirect()->route('admin.shop.product.index')->with('success', 'محصول ویرایش شد');
        } else {
            return redirect()->back()->with('error', 'خطا در ویرایش محصول٬ دوباره تلاش کنید');
        }
    }

    public function changeSpecial(Product $product)
    {
        if ($product->update(['special' => $product->special == 1 ? 0 : 1])) {
            return redirect()->back()->with('success', 'ویژگی محصول تغییر کرد');
        } else {
            return redirect()->back()->with('error', 'خطا در تغییر ویژگی محصول');
        }
    }

    public function changeMostSold(Product $product)
    {
        if ($product->update(['most_sold' => $product->most_sold == 1 ? 0 : 1])) {
            return redirect()->back()->with('success', 'ویژگی محصول تغییر کرد');
        } else {
            return redirect()->back()->with('error', 'خطا در تغییر ویژگی محصول');
        }
    }

    public function changeStatus(Product $product)
    {
        if ($product->update(['status' => $product->status == 1 ? 0 : 1])) {
            return redirect()->back()->with('success', 'وضعیت محصول تغییر کرد');
        } else {
            return redirect()->back()->with('error', 'خطا در تغییر وضعیت محصول');
        }
    }

    public function changeQty(Product $product, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'qty' => 'required',
            'action' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'در هنگام تغییر موجودی محصول خطایی رخ داد');
        }

        if ($request->action == 'increase') {
            $new_qty = $product->qty + $request->qty;
        } elseif ($request->action == 'decrease') {
            $new_qty = $product->qty - $request->qty;
        } else {
            return redirect()->back()
                ->with('error', 'در هنگام تغییر موجودی محصول خطایی رخ داد');
        }

        if ($product->update(['qty' => $new_qty])) {
            return redirect()->back()->with('success', "موجودی محصول '$product->title' تغییر کرد");
        } else {
            return redirect()->back()->with('error', 'خطا در تغییر موجودی محصول');
        }
    }
}
