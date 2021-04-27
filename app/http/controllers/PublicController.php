<?php


namespace App\http\controllers;


use App\core\Request;
use App\models\Product;

class PublicController extends Controller
{


    public function index(Request $request){

        $message='Method not support';
        $status_code=200;
        $data=[];


            $data = Product::with('category')->get();
            $message ='Product';
            $status_code=200;


        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];

        http_response_code($status_code);
        return json_encode($responsemessage);


    }




}