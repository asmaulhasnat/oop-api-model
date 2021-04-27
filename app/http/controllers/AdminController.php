<?php


namespace App\http\controllers;


use App\core\Request;
use App\http\middleware\AuthorizationMiddleware;
use App\models\Order;
use App\models\Product;
use App\validation\UserValidation;
use App\validation\CategoryStoreValidateion;
use App\validation\CategoryUpdateValidation;
use App\validation\ProductStoreValidation;
use App\validation\ProductUpdateValidation;

use App\models\Category;

class AdminController extends Controller
{
    public  $user =[];
    public function __construct()
    {
        //$this->user = AuthorizationMiddleware::authentication(['user']);
    }
    public function allProduct(Request $request){

        $message='Product';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {
            $data =Product::with('Category')->get();

        }

        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];
        http_response_code($status_code);
        return json_encode($responsemessage);
    }
    public function createProduct(Request $request){

        $message='Method not support';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {
            $productValid= new ProductStoreValidation();
            $productValid->loadData($request->getBody());
            if ($productValid->validate()){
                $product = new Product();
                $product->name = $request->getBody()['name'] ?? '';
                $product->sku = $request->getBody()['sku'] ?? '';
                $product->description = $request->getBody()['description'] ?? '';
                $product->category_id = $request->getBody()['category_id'] ?? '';
                $product->price = $request->getBody()['price'] ?? 0;
                $product->image = $request->getBody()['image'] ?? '';
                if ($product->save()) {
                    $data=$product;
                    $message= 'Product created successfully';
                    $status_code =200;
                } else {
                    $message= 'Product creation Fail';
                    $status_code =200;
                }
            }else{
                $message= 'Validation Fail';
                $status_code =422;
                $data=$productValid->errors;
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


    public function editProduct(Request $request){

        $message='Category';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {
            $data['categories'] =Category::get();
            $data['product'] =Product::where('id',$request->getBody()['id'])->with('Category')->first();
        }

        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];
        http_response_code($status_code);
        return json_encode($responsemessage);

    }

    public function updateProduct(Request $request){

        $message='Method not support';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {

            $productValid= new ProductUpdateValidation();
            $productValid->loadData($request->getBody());

            if ($productValid->validate()){

                $product = Product::where('id',$request->getBody()['id'])
                    ->update([
                        'name'=>$request->getBody()['name'] ?? '',
                        'sku'=>$request->getBody()['name'] ?? '',
                        'description'=>$request->getBody()['sku'] ?? '',
                        'category_id'=>$request->getBody()['category_id'] ?? '',
                        'price'=>$request->getBody()['price'] ?? '',
                        'image'=>$request->getBody()['image'] ?? '',
                        ]);
                if ($product) {
                    $data=$product;
                    $message= 'Product update successfully';
                    $status_code =200;
                } else {
                    $message= 'Product update Fail';
                    $status_code =200;
                }
            }else{
                $message= 'Validation Fail';
                $status_code =422;
                $data=$productValid->errors;
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



    public function createCategory(Request $request){
        $message='Method not support';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {
            $categoryValid= new CategoryStoreValidateion();
            $categoryValid->loadData($request->getBody());
            if ($categoryValid->validate()){
                $category = new Category();
                $category->name = $request->getBody()['name'] ?? '';
                if ($category->save()) {
                    $data=$category;
                    $message= 'Category created successfully';
                    $status_code =200;
                } else {
                    $message= 'Category creation Fail';
                    $status_code =200;
                }
            }else{
                $message= 'Validation Fail';
                $status_code =422;
                $data=$categoryValid->errors;
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
    public function categoryAll(Request $request){
        $message='Category';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {
            $data =Category::get();

        }

        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];
        http_response_code($status_code);
        return json_encode($responsemessage);

    }

    public function editCategory(Request $request){
        $message='Category';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {
            $data =Category::where('id',$request->getBody()['id'])->first();

        }

        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];
        http_response_code($status_code);
        return json_encode($responsemessage);

    }

    public function updateCategory(Request $request){
        $message='Method not support';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {

            $categoryValid= new CategoryUpdateValidation();
            $categoryValid->loadData($request->getBody());

            if ($categoryValid->validate()){

                $category = Category::where('id',$request->getBody()['id'])->update(['name'=>$request->getBody()['name'] ?? '']);
                //dump($category);
                if ($category) {
                    $data=$category;
                    $message= 'Category update successfully';
                    $status_code =200;
                } else {
                    $message= 'Category update Fail';
                    $status_code =200;
                }
            }else{
                $message= 'Validation Fail';
                $status_code =422;
                $data=$categoryValid->errors;
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

    public function updateOrder(Request $request){
        $message='Method not support';
        $status_code=200;
        $data=[];

        $order = Order::where('id',$request->getBody()['id'])
            ->update([
                'order_status'=>$request->getBody()['order_status'] ?? ''
            ]);
        if ($order) {
            $data=$order;
            $message= 'Order update successfully';
            $status_code =200;
        } else {
            $message= 'Order update Fail';
            $status_code =422;
        }

        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];
        http_response_code($status_code);
        return json_encode($responsemessage);


    }

    public function allOrders(Request $request){
        $message='all order';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {
            $data =Order::get();

        }

        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];
        http_response_code($status_code);
        return json_encode($responsemessage);
    }

    public function viewOrder(Request $request){

        $message='Single Order';
        $status_code=200;
        $data=[];
        if ($request->getMethod() === 'post') {
            $data =Order::where('id',$request->getBody()['id'])->first();

        }

        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];
        http_response_code($status_code);
        return json_encode($responsemessage);

    }


}