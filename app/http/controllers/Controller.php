<?php


namespace App\http\controllers;
use Illuminate\Database\Capsule\Manager as DB;


use App\core\Application;

class Controller
{
    public string $layout ='main';

    public function setLayout($layout){
        $this->layout =$layout;
    }
    public static function render($view,$params=[]){
        return Application::$app->router->renderView($view,$params);
    }
}