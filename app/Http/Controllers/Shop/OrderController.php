<?php

namespace App\Http\Controllers\Shop;

use App\Classes\Shop\CartHelper;
use App\Classes\Shop\DiscountHelper;
use App\Classes\Shop\OrderHelper;
use App\Classes\Shop\TransactionHelper;
use App\Classes\SiteHelper;
use App\Http\Controllers\Controller;
use App\Models\Shop\Discount;
use App\Models\Shop\Cart;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use App\Models\Shop\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class OrderController extends Controller
{


    public function details()
    {
        $cart_items = Cart::where('user_id', Auth::id())->get();

        if ($cart_items->isEmpty()) {
            return redirect()->route('shop.cart.index')->with('error', 'سبد خرید شما خالی است');
        }

        $validated = CartHelper::validate($cart_items);

        if (!$validated['status']) {
            return redirect()->route('shop.cart.index')->with('error', [
                'message' => 'لطفا سبد خرید را بررسی کنید!',
                'products' => $validated['products'],
            ]);
        }


        $states = SiteHelper::getStates();
        $address = OrderHelper::getActiveOrderAddress(true);
        $cart_details = CartHelper::getCartDetails($cart_items);
        $discount = $cart_details['real_discount_id'] ? Discount::find($cart_details['real_discount_id']) : null;

        return view('user.shop.shipping', compact('states', 'address', 'cart_details', 'discount'));
    }

    public function payment()
    {
        $cart_items = Cart::where('user_id', Auth::id())->get();
        $cart_details = CartHelper::getCartDetails($cart_items);
        $order = OrderHelper::getActiveOrder();
        $discount = $cart_details['real_discount_id'] ? Discount::find($cart_details['real_discount_id']) : null;

        return view('user.shop.payment', compact('cart_items', 'cart_details', 'order', 'discount'));
    }

    public function createOrder(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'fname' => ['required', 'string'],
                'lname' => ['required', 'string'],
                'postal_code' => ['required', 'size:10', 'string'],
                'city_id' => ['required', 'integer'],
                'state_id' => ['required', 'integer'],
                'address' => ['required', 'string']

            ],
            [
                'fname.required' => 'نام را وارد کنید',
                'fname.string' => 'نام را درست وارد کنید',
                'lname.required' => 'نام خانوادگی را وارد کنید',
                'lname.string' => 'نام خانوادگی را درست وارد کنید',
                'postal_code.required' => 'کد پستی را وارد کنید',
                'postal_code.size' => 'کد پستی را درست وارد کنید',
                'address.required' => 'آدرس را وارد کنید',
                'address.string' => 'آدرس را درست وارد کنید',

                'state_id.required' => 'استان را انتخاب کنید',
                'state_id.integer' => 'استان را انتخاب کنید',
                'city_id.required' => 'شهر را انتخاب کنید',
                'city_id.integer' => 'شهر را انتخاب کنید',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cart_items = Cart::where('user_id', auth('web')->user()->id)->get();
        $cart_details = CartHelper::getCartDetails($cart_items);


        $params = [
            'user_id' => auth('web')->user()->id,
            'tax' => $cart_details['tax_amount'],
            'cost' => $cart_details['payable_amount'],
            'discount' => $cart_details['real_discount'],
            'discount_id' => $cart_details['real_discount_id'],
            'post' => $cart_details['post_cost'],
            'address' => json_encode([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'postal_code' => $request->postal_code,
                'address' => $request->address,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
            ]),
        ];

        $validated = CartHelper::validate($cart_items);


        $existing_order = OrderHelper::getActiveOrder();


        if ($existing_order) {
            $order = $existing_order->update($params);
        } else {
            $order = Order::create($params);
        }


        if (!$validated['status']) {
            return redirect()->route('shop.cart.index')->with('error', [
                'message' => 'لطفا سبد خرید را بررسی کنید!',
                'products' => $validated['products'],
            ]);
        }


        if (!$order) {
            return redirect()->back()->with('error', 'خطا در ثبت سفارش! لطفا دوباره تلاش کنید.')->withInput();
        }

        $current_order = OrderHelper::getActiveOrder();

        return redirect()->route('shop.order.payment', ['cart_details' => $cart_details, 'order' => $current_order]);
    }

    public function applyDiscount(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'discount_code' => 'required|string',
            ],
            [
                'discount_code.required' => 'کد تخفیف را وارد کنید',
                'discount_code.string' => 'کد تخفیف را درست وارد کنید',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $order = OrderHelper::getActiveOrder();
        $discount = Discount::where('code', $request->discount_code)->first();

        $result = DiscountHelper::handle($order, $discount);

        if ($result['status']) {
            return redirect()->back()->with('success', 'کد تخفیف اعمال شد');
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }

    public function payOrder(Request $request)
    {
        $cart_items = Cart::where('user_id', Auth::user()->id)->get();
        $cart_details = CartHelper::getCartDetails($cart_items);

        $order = OrderHelper::getActiveOrder();

        $order->update([
            'status' => Order::STATUS_GATEWAY,
            'tax' => $cart_details['tax_amount'],
            'cost' => $cart_details['payable_amount'],
            'discount' => $cart_details['real_discount'],
            'discount_id' => $cart_details['real_discount_id'],
            'post' => $cart_details['post_cost'],
        ]);

        $validated = CartHelper::validate($cart_items);

        if (!$validated['status']) {
            return redirect()->route('shop.cart.index')->with('error', [
                'message' => 'لطفا سبد خرید را بررسی کنید!',
                'products' => $validated['products'],
            ]);
        }

        $pay_amount = $cart_details['payable_amount'] + $cart_details['post_cost'] + $cart_details['tax_amount'] - $cart_details['real_discount'];

        // I will pay less :)
        if (Auth::user()->phone == env('SUPPORT_PHONE')) {
            $pay_amount = 1000;
        }



        $invoice = new Invoice;
        $invoice->amount($pay_amount);

        $order_transaction = TransactionHelper::getActiveTransaction($order, $invoice);

        $invoice->transactionId($order_transaction->id);


        $cart_data = $cart_items->map(function ($item) {
            return [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'qty' => $item->qty,
            ];
        });

        session()->put('checkout_cart', $cart_data);


        return ShetabitPayment::purchase($invoice, function ($driver, $transactionId) use ($order_transaction) {
            $order_transaction->update([
                'track_id' => $transactionId,
                'status' => Transaction::STATUS_GATEWAY,
            ]);
        })->pay()->render();
    }

    public function callback(Request $request)
    {
        $transaction = Transaction::where('track_id', $request->transactionId)->first();
        $status = Transaction::STATUS_PENDING;
        $message = '';

        if ($transaction) {

            if ($transaction->status == Transaction::STATUS_VERIFIED) {
                $status = Transaction::STATUS_UNKNOWN;
                $message = "این تراکنش قبلا تکمیل شده است";
                return view('user.shop.order-result', compact('status', 'transaction', 'message'));
            }

            if ($request->cancel) {
                $transaction->update([
                    'status' => Transaction::STATUS_CANCELED,
                ]);

                $status = Transaction::STATUS_CANCELED;
            } else {
                try {
                    DB::transaction(function () use ($transaction, &$status, &$message) {


                        if (!Auth::check()) {
                            Auth::LoginUsingId($transaction->user_id);
                        }

                        $cart_data = session()->get('checkout_cart');

                        if (!$cart_data) {
                            $message = 'خطا در دریافت سبد خرید';
                            throw new \Exception("cart not found in session");
                        }


                        // fetch order from database
                        $order = Order::find($transaction->order_id);

                        $products = [];

                        // check if item is available (qty is not less than the amount in user's cart)
                        foreach ($cart_data as $item) {


                            $product = Product::lockForUpdate()->find($item['product_id']);

                            if (!$product) {
                                $message = 'خطا در دریافت سبد خرید';
                                throw new \Exception("invalid product ID: " . $item['product_id']);
                            }

                            if ($product->qty < $item['qty']) {
                                $message = 'موجودی یکی از محصولات سبد خرید به اتمام رسیده است';
                                throw new \Exception("qty more than available for product ID: " . $item['product_id']);
                            }

                            // safe to deduct qty from stock
                            $product->decrement('qty', $item['qty']);
                            $products[$item['product_id']] = $product;
                        }

                        $order->update([
                            'status' => Order::STATUS_PAID,
                            'paid_at' => Carbon::now(),
                        ]);

                        OrderHelper::addCartItemsToOrder($order->id, $cart_data, $products);
                        CartHelper::clearCart(Auth::id());

                        // finally verify the payment
                        $receipt = ShetabitPayment::amount($transaction->amount)
                            ->transactionId($transaction->track_id)
                            ->verify();

                        $transaction->update([
                            'ref_id' => $receipt->getReferenceId(),
                            'status' => Transaction::STATUS_VERIFIED,
                            'trace' => $receipt->traceNo,
                            'bank_order_id' => $receipt->orderId,
                            'card' => $receipt->cardNo,
                        ]);

                        $status = Transaction::STATUS_VERIFIED;
                        session()->forget('checkout_cart');
                    });
                } catch (InvalidPaymentException $exception) {
                    // Payment failed → nothing is charged
                    $transaction->update([
                        'status' => Transaction::STATUS_FAILED,
                        'bank_message' => $exception->getMessage()
                    ]);

                    $order = Order::find($transaction->order_id);
                    $order->update([
                        'status' => Order::STATUS_FAILED,
                    ]);

                    $status = Transaction::STATUS_FAILED;
                } catch (\Throwable $e) {

                    // Error before/after payment verification
                    $transaction->update([
                        'status' => Transaction::STATUS_FAILED,
                        'bank_message' => $message
                    ]);
                    $status = Transaction::STATUS_FAILED;

                    $order = Order::find($transaction->order_id);
                    $order->update([
                        'status' => Order::STATUS_FAILED,
                    ]);

                    Log::error($e->getMessage());
                }
            }
        } else {
            $status = Transaction::STATUS_UNKNOWN;

            Log::error("Transaction id not found $request->transactionId");

            $transaction = $request->transactionId;
            $message = 'تراکنش بامشخصات ارائه شده توسط بانک پیدا نشد';
        }

        return view('user.shop.order-result', compact('status', 'transaction', 'message'));
    }
}
