<?php

namespace App\Http\Controllers\Shop;

use App\Classes\Uploader;
use App\Http\Controllers\Controller;
use App\Models\Shop\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::orderBy('id', 'desc')->paginate(16);

        return view('admin.categories', compact('categories'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'parent_id' => 'nullable|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'لطفا نام دسته‌بندی را وارد کنید',
            'title.string' => 'لطفا دسته‌بندی را درست وارد کنید',
            'image.required' => 'عکس را وارد کنید',
            'image.mimes' => 'عکس باید jpeg - png - jpg - gif باشد',
            'image.max' => 'عکس نباید بزرگتر از 2 مگابایت باشد',
            'parent_id.string' => 'لطفا زیرمجموعه را درست وارد کنید',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('action', 'create');
        }

        if ($request->hasFile('image')) {
            $uploader = new Uploader;
            $path = $uploader->uploadImage($request->image, 'shop/category');
        } else {
            $path = null;
        }

        $create = Categories::create([
            'title' => $request->title,
            'parent_id' => $request->parent_id ?? null,
            'slug' => str_replace(' ', '-', $request->title),
            'image' => $path,
        ]);

        if ($create) {
            return redirect()->route('admin.shop.category.index')->with('success', 'دسته بندی با موفقیت ثبت شد');
        }

        return redirect()->route('admin.shop.category.index')->with('error', 'دسته بندی ثبت نشد');
    }

    public function update(Request $request, Categories $category)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'parent_id' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'لطفا نام دسته‌بندی را وارد کنید',
            'image.mimes' => 'عکس محصول باید jpeg - png - jpg - gif باشد',
            'image.max' => 'عکس محصول عکس محصول نباید بزرگتر از 2 مگابایت باشد',
            'title.string' => 'لطفا دسته‌بندی را درست وارد کنید',
            'parent_id.string' => 'لطفا زیرمجموعه را درست وارد کنید',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('action', 'edit');
        }

        if ($request->hasFile('image')) {
            $uploader = new Uploader;
            $path = $uploader->uploadImage($request->image, 'shop/category', $category->image);
        }

        $update = $category->update([
            'title' => $request->title,
            'parent_id' => $request->parent_id ?? null,
            'slug' => str_replace(' ', '-', $request->title),
            'image' => $path ?? $category->image,
        ]);

        if ($update) {
            return redirect()->route('admin.shop.category.index')->with('success', 'دسته بندی با موفقیت ویرایش شد');
        }

        return redirect()->route('admin.shop.category.index')->with('error', 'دسته بندی ویرایش نشد');
    }

    public function changeStatus(Categories $category)
    {
        $category->update([
            'status' => $category->status == 1 ? 0 : 1,
        ]);

        return redirect()->route('admin.shop.category.index')->with('success', 'وضعیت دسته بندی با موفقیت تغییر کرد');
    }
}
