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
       $this->user = AuthorizationMiddleware::authentication(['user']);
    }
    public function index(Request $request){
        return $user_data = $this->user['name'];
    }

}