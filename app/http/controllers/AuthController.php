<?php


namespace App\http\controllers;


use App\core\Request;
use App\models\User;
use App\validation\UserValidation;
use App\validation\loginValidation;

use \Firebase\JWT\JWT;
class AuthController extends Controller
{
    public function index(){

    }
    public function store(Request $request){
        $message='';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {
            $register= new UserValidation();
            $register->loadData($request->getBody());
            if ($register->validate()){
                $user = new User();
                $user->name = $request->getBody()['name'] ?? '';
                $user->email = $request->getBody()['email'] ?? '';
                $user->password = $request->getBody()['password'] ?? '';
                if ($user->save()) {
                    $data=$user;
                    $message= 'User register successfully';
                    $status_code =200;
                } else {
                    $message= 'User register Fail';
                    $status_code =200;
                }
            }else{
                $message= 'Validation Fail';
                $status_code =422;
                $data=$register->errors;
            }

        }
        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];
        http_response_code($status_code);
        return json_encode($responsemessage);

    }

    public function login(Request $request){

        $massage='';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {
            $login= new loginValidation();
            $login->loadData($request->getBody());
            if ($login->validate()){
                $user = User::where('email',$request->getBody()['email'])->where('password',$request->getBody()['password'])->first();
                //var_dump($user);

                if (!empty($user)) {
                    $lat = time();
                    $nbf =$lat + $_ENV['APP_SESSION_TIME'] ;
                    $key =$_ENV['JWT_SECRET'];
                    $payload = array(
                        "iss" => $_ENV['APP_URL'],
                        "aud" => $_ENV['APP_URL'],
                        "iat" => $lat,
                        //"nbf" => $nbf,
                        "exp" => $nbf,
                        "user"=>$user,
                    );
                    $jwt = JWT::encode($payload, $key);
                    $data=['user'=>$user,'access_token'=>$jwt];
                    $message= 'Login';
                } else {
                    $message= 'Email or Password does not match';
                }
                $status_code =200;
            }else{
                $message= 'Validation Fail';
                $status_code =422;
                $data=$login->errors;
            }

        }

        $responsemessage =[
            'status'=>http_response_code($status_code),
            'message' =>$message,
            'data' =>$data,

        ];
        http_response_code($status_code);
        return json_encode($responsemessage);

    }

}