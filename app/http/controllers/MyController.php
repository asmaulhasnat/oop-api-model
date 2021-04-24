<?php


namespace App\http\controllers;


use App\core\Application;
use App\core\Request;

class MyController extends Controller
{
    public function index(Request $request){
        return $this->render('contact');
    }
    public function post(Request $request){
        $body=$request->getBody();
        //how to data pass
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        $data=['name'=>'Asmaul Hasnat'];
        return $this->render('post',$data);
    }
    public function put(Request $request){
        $body=$request->getBody();
        //how to data pass
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        return $this->render('put');
    }
    public function view(Request $request){
        $body=$request->getBody();
        //how to data pass
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        return $this->render('view');
    }
    public function patch(Request $request){
        $body=$request->getBody();
        //how to data pass
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        return $this->render('patch');
    }
    public function delete(Request $request){
        $body=$request->getBody();
        //how to data pass
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        return $this->render('delete');
    }
    public function options(Request $request){
        $body=$request->getBody();
        //how to data pass
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        return $this->render('options');
    }

}