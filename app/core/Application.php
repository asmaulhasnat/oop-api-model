<?php

namespace App\core;

class Application
{
    public Router  $router;
    public Request  $request;
    public Response  $response;
    public static string  $ROOT_DIR;
    public static Application $app;
    public function __construct($rootpath){
        self::$app =$this;
        $this->request = new  Request();
        $this->response = new  Response();
        $this->router = new  Router($this->request, $this->response);
        self::$ROOT_DIR = $rootpath;
    }
    
    public function run(){
        echo $this->router->resolve();
    }
}
