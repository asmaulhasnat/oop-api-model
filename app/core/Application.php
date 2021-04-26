<?php

namespace App\core;

use App\http\controllers\Controller;


class Application
{
    public Router  $router;
    public Request  $request;
    public Response  $response;
    public static string  $ROOT_DIR;
    public static Application $app;
    public Controller $controller;


    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
    public function __construct($rootpath){
        self::$app =$this;
        $this->request = new  Request();
        $this->response = new  Response();
        //$this->DB = new DB();

        $this->router = new  Router($this->request, $this->response);
        self::$ROOT_DIR = $rootpath;
    }
    
    public function run(){
        try {
            echo  $this->router->resolve();
        }catch(\Exception $exception){
            http_response_code(403);
             $responsemessage =[
                'status'=>'403',
                'message' =>'Unauthorized or   '.$exception->getMessage(),
                'data' =>[],

            ];
            echo  json_encode($responsemessage);
        }

    }
}
