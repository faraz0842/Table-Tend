<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Str;

class OrderController extends Controller
{
    use ApiResponser;

    public function create(StoreOrderRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                // Create a new order
                $order = new Order();
                $order->token = strtoupper(Str::random(6));
                $order->user_id = Auth::user()->id;
                $order->restaurant_id = $request->restaurant_id;
                $order->name = $request->name;
                $order->email = $request->email;
                $order->phone_number = $request->phone_number;
                $order->address = $request->address;
                $order->instruction = $request->instruction;
                $order->sub_total = $request->sub_total;
                $order->total = $request->total;
                $order->payment_method = $request->payment_method;
                $order->save();

                // Add the order details
                $orderDetails = json_decode($request->input('order_details'), true);
                foreach ($orderDetails as $detailData) {
                    $detail = new OrderDetail();
                    $detail->order_id = $order->id;
                    $detail->food_id = $detailData['food_id'];
                    $detail->quantity = $detailData['quantity'];
                    $detail->price = $detailData['price'];
                    $detail->save();
                }
            });

            return $this->success('Order Created');
        } catch (Exception $ex) {
            return $this->error($ex->getMessage(), 204);
        }
    }
}
