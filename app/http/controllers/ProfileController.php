<?php


namespace App\http\controllers;
use App\core\Request;
use App\models\User;
use App\http\middleware\AuthorizationMiddleware;

class ProfileController extends Controller
{
    public  $user =[];
    public function __construct()
    {
       $this->user = AuthorizationMiddleware::authentication(['user','admin']);
    }
    public function index(Request $request){
        $user = User::where('id',$this->user['id'])->first();
        return json_encode($user);
    }

}