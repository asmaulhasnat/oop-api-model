<?php


namespace App\http\controllers;


use App\core\Request;

use App\http\middleware\AuthorizationMiddleware;
use App\models\Order;
use App\validation\OrderValidation;


class OrderController extends Controller
{
    public  $user =[];
    public function __construct()
    {
        //$this->user = AuthorizationMiddleware::authentication(['user']);
    }

    public function index(Request $request){

        $message='Method not support';
        $status_code=200;
        $data=[];


            $data = Order::where('user_id',1)->with('Product')->get();
            $message ='Order items';
            $status_code=200;


        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];

        http_response_code($status_code);
        return json_encode($responsemessage);


    }

    public function getStatus(Request $request){

        $message='Method not support';
        $status_code=200;
        $data=[];


            $data = Order::where('user_id',1)->where('id',$request->getBody()['id'])->with('Product')->first();
            $message ='Order items';
            $status_code=200;


        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];

        http_response_code($status_code);
        return json_encode($responsemessage);


    }

     public function store(Request $request){
         $message='Method not support';
         $status_code=200;
         $data=[];

             $orderValid= new OrderValidation();
             $orderValid->loadData($request->getBody());
             if ($orderValid->validate()){
                 $order = new Order();
                 $order->user_id = $this->user['id'] ?? $request->getBody()['user_id'] ;
                 $order->items = $request->getBody()['items'] ?? '';
                 $order->phone = $request->getBody()['phone'] ?? '';
                 $order->address = $request->getBody()['address'] ?? '';
                 if ($order->save()) {
                     $data=$order;
                     $message= 'Order created successfully';
                     $status_code =200;
                 } else {
                     $message= 'Order creation Fail';
                     $status_code =422;
                 }
             }else{
                 $message= 'Validation Fail';
                 $status_code =422;
                 $data=$orderValid->errors;
             }


         $responsemessage =[
             'status'=>$status_code,
             'message' =>$message,
             'data' =>$data,

         ];
         http_response_code($status_code);
         return json_encode($responsemessage);


     }
}