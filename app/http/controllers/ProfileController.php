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
       $this->user = AuthorizationMiddleware::authentication();
    }
    public function index(Request $request){
        $user_data = json_decode($this->user, true);
        $user_full_data = $user_data['data']['user'];
    }

}