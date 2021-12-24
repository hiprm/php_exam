<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class OrderManagementController extends Controller
{
    private $order;

    public function __construct()
    {
        $this->order = new OrderRepository();
    }

    public function order(Request $request)
    {
        $request->merge(['id' => $request->route('id')]);
        $validator = Validator::make($request->all(), [
            "id" => "required|integer",
        ]);

        if ($validator->passes()) {
            try {
                $order_id_is_exist = $this->order->orderIdIsExists($request->id);

               // return $order_id_is_exist;

                if ($order_id_is_exist === 0) {
                    $json['msg_type'] = 'ERROR';
                    $json['data'] = array("success" => false, "status_code" => 400,
                        "error" => "Order ID not in the database");
                    return response()->json($json, 200);
                } else {
                    $order_information = $this->order->getOrderById($request->id);
                    return response()->json($order_information, 200);
                }



            } catch (\Exception $error) {
                $json['msg_type'] = 'ERROR';
                $json['data'] = array("success" => false, "status_code" => 400, "error" => $error->getMessage());
                return response()->json($json, 200);
            }
        } else {
            $json['msg_type'] = 'ERROR';
            $json['data'] = array("success" => false, "status_code" => 400, "error" => $validator->errors()->all());
            return response()->json($json, 200);
        }
    }

    public function createOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "customerId" => "required|integer",
            "orderDate" => "required|date",
            "status" => "required|string",
            "order_details.*.productId" => 'required|integer',
            "order_details.*.orderQty" => 'required|integer',
            "order_details.*.unitPrice" => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
        ]);

        if ($validator->passes()) {
            try {
                $response = $this->order->createOrder($request->all());
                return response()->json($response, 200);
            } catch (\Exception $error) {
                $json['msg_type'] = 'ERROR';
                $json['data'] = array("success" => false, "status_code" => 400, "error" => $error->getMessage());
                return response()->json($json, 200);
            }
        } else {
            $json['msg_type'] = 'ERROR';
            $json['data'] = array("success" => false, "status_code" => 400, "error" => $validator->errors()->all());
            return response()->json($json, 200);
        }
    }

}
