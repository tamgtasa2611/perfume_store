<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Requests\StoreOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;
use function Sodium\add;

class OrderController extends Controller
{
    public function checkoutProcess(StoreOrderRequest $request)
    {
        //date mua hang
        $dateBuy = date("Y-m-d H:i:s");
        //lay status (status mac dinh la 0 tuong ung trang thai xac nhan don hang)
        $status = 0;
        //1: pay on delivery, 2: pay on vnpay
        $methodId = 1;
        //customer id
        $customerId = Auth::guard('customer')->id();

////        if ($request->validated()) {
        $array = [];
        $array = Arr::add($array, 'order_date', $dateBuy);
        $array = Arr::add($array, 'order_status', $status);
        $array = Arr::add($array, 'receiver_name', $request->receiver_name);
        $array = Arr::add($array, 'receiver_phone', $request->receiver_phone);
        $array = Arr::add($array, 'receiver_address', $request->receiver_address);
//        $array = Arr::add($array, 'admin_id', 1);
        $array = Arr::add($array, 'customer_id', $customerId);
//        $array = Arr::add($array, 'method_id', $methodId);
        Order::create($array);

        $maxOrderId = Order::where('customer_id', $customerId)->max('id');
        if (!$maxOrderId) {
            $maxOrderId = 1;
        }

        //lay du lieu de insert vao bang order_details
        foreach (\Illuminate\Support\Facades\Session::get('cart') as $product_id => $product) {
            $orderDetails = [];
            $orderDetails = Arr::add($orderDetails, 'order_id', $maxOrderId);
            $orderDetails = Arr::add($orderDetails, 'product_id', $product_id);
            $orderDetails = Arr::add($orderDetails, 'sold_price', $product['price']);
            $orderDetails = Arr::add($orderDetails, 'sold_quantity', $product['quantity']);

            $productQuantity = Product::find($product_id);
            $productQuantity->quantity -= $product['quantity'];
            $productQuantity->save();
            OrderDetail::create($orderDetails);
        }

        Session::forget('cart');
        return Redirect::route('ordersHistory')->with('success', 'Order created successfully!');
//        } else {
//            dd("loi");
////            return Redirect::route('checkout')->with('error', 'Create order failed!');
//        }
    }
}
