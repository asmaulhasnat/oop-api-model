<?php


namespace App\http\middleware;
use \Firebase\JWT\JWT;
use App\core\Request;

class AuthorizationMiddleware
{
     public static function authentication(){
         $message='';
         $status_code=200;
         $data=[];
         $request= new Request();
         $key =$_ENV['JWT_SECRET'];
         $jwt =$request->getBody()['token'] ?? $request->getHeaderToken();
         $decoded = JWT::decode($jwt, $key, ['HS256']);
         $message ='Authenticated';
         $status_code=2000;
         $data =$decoded;

         $responsemessage =[
             'status'=>$status_code,
             'message' =>$message,
             'data' =>$data,
         ];
         return json_encode($responsemessage);
    }
}