<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetails;

class OrderRepository
{
    public function getOrderById($id)
    {
        $json = array();
        $order = Order::with(['customer'])
            ->where('id', $id)
            ->get();


        $order_details = OrderDetails::where('orderId', $id)
            ->with(['product'])
            ->get();

        $arr = array();
        $total = 0;
        foreach ($order_details as $order_detail) {
            $product = ["product_code" => $order_detail->product->code,
                "product_name" => $order_detail->product->name,
                "unit_price" => $order_detail->unitPrice,
                "qty" => $order_detail->orderQty,
                "total" => ($order_detail->orderQty) * ($order_detail->unitPrice)];
            $total = ($order_detail->orderQty) * ($order_detail->unitPrice) + $total;
            array_push($arr, $product);
        }

        unset($order[0]->customer["id"]);

        $json["status_code"] = 200;
        $json["order_id"] = $order[0]->id;
        $json["order_date"] = $order[0]->orderDate;
        $json["status"] = $order[0]->status;
        $json["order_details"] = $arr;
        $json["bill_amount"] = $total;
        $json["customer"] = $order[0]->customer;

        return $json;

    }

    public function createOrder($request)
    {
        $order_id = Order::create(['customerId' => $request['customerId'],
            'orderDate' => $request['orderDate'],
            'status' => $request['status'],
            'comment' => $request['comment']])->id;

        foreach ($request['order_details'] as $order_detail) {

            OrderDetails::create([
                'orderId'=>$order_id,
                'customerId'=>$request["customerId"],
                'productId'=>$order_detail['productId'],
                'orderQty'=>$order_detail['orderQty'],
                'unitPrice'=>$order_detail['unitPrice']
            ]);
        }
        $json = array();
        $json["status"] = 200;
        $json["order_id"]=$order_id;

        return $json;
    }

    public function orderIdIsExists($id){
        $order = Order::where('id',  $id)->first();
        if ($order === null) {
            return 0;
        }else{
            return 1;
        }
    }
}
