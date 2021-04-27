<?php


namespace App\http\middleware;
use \Firebase\JWT\JWT;
use App\core\Request;

class AuthorizationMiddleware
{
     public static function authentication($type=[]){
         $message='';
         $status_code=200;
         $data=[];
         $request= new Request();
         $key =$_ENV['JWT_SECRET'];
         $jwt =$request->getBody()['token'] ?? $request->getHeaderToken();
         $decoded = JWT::decode($jwt, $key, ['HS256']);
         $message ='Authenticated';
         $status_code=2000;

         $user_data = json_decode(json_encode($decoded), true);
         $user_full_data = $user_data ['user'] ?? null;
         $usertype = $user_full_data ['user_type'] ?? null ;
         if (in_array($usertype,$type)){
             http_response_code(403);
             throw new \Exception('unauthorised.');
         };
         return $data = $user_full_data;
    }
}