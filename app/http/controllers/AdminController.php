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
use Intervention\Image\ImageManager;

class AdminController extends Controller
{
    public  $user =[];
    public function __construct()
    {
        $this->user = AuthorizationMiddleware::authentication(['admin']);
    }
    public function allProduct(Request $request){

        $message='Product';
        $status_code=200;
        $data=[];
        
        $data['product'] =Product::with('Category')->get();
        $data['category'] =Category::get();


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

            $image_file =$_FILES['image'] ?? false;
            if ($image_file){
                $manager = new ImageManager();
                // resize image
                $image=$manager->make($image_file['tmp_name'])->resize(584, 584);

                // save image
                $file_name='http://'.$_SERVER['HTTP_HOST'].'/images/'.time().$image_file['name'];
                $image->save('images/'.time().$image_file['name']);
            }
            else{
                $file_name=null;
            }


            $productValid= new ProductStoreValidation();
            $productValid->loadData($request->getBody());
            if ($productValid->validate()){
                $product = new Product();
                $product->name = $request->getBody()['name'] ?? '';
                $product->sku = $request->getBody()['sku'] ?? '';
                $product->description = $request->getBody()['description'] ?? '';
                $product->category_id = $request->getBody()['category_id'] ?? '';
                $product->price = $request->getBody()['price'] ?? 0;
                $product->image = $file_name;
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

            $data['categories'] =Category::get();
            $data['product'] =Product::where('id',$request->getBody()['id'])->with('Category')->first();


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




            $productValid= new ProductUpdateValidation();
            $productValid->loadData($request->getBody());

            if ($productValid->validate()){

                $image_file =$_FILES['image'] ?? false;
                if ($image_file){
                    $manager = new ImageManager();
                    // resize image
                    $image=$manager->make($image_file['tmp_name'])->resize(584, 584);

                    // save image
                    $file_name='http://'.$_SERVER['HTTP_HOST'].'/images/'.time().$image_file['name'];
                    $image->save('images/'.time().$image_file['name']);
                }
                else{
                    $file_name=Product::where('id',$request->getBody()['id'])->first()->image ?? null;
                }

                $product = Product::where('id',$request->getBody()['id'])
                    ->update([
                        'name'=>$request->getBody()['name'] ?? '',
                        'sku'=>$request->getBody()['sku'] ?? '',
                        'description'=>$request->getBody()['description'] ?? '',
                        'category_id'=>$request->getBody()['category_id'] ?? '',
                        'price'=>$request->getBody()['price'] ?? '',
                        'image'=>$file_name,
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


        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];
        //http_response_code($status_code);
        return json_encode($responsemessage);

    }



    public function createCategory(Request $request){
        $message='Method not support';
        $status_code=200;
        $data=[];
        
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

        
        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];
        //http_response_code($status_code);
        return json_encode($responsemessage);

    }
    public function categoryAll(Request $request){
        $message='Category';
        $status_code=200;
        $data=[];

            $data =Category::get();



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

            $data =Category::where('id',$request->getBody()['id'])->first();



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

        $data =Order::with('User')->get();



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

            $data =Order::where('id',$request->getBody()['id'])->first();



        $responsemessage =[
            'status'=>$status_code,
            'message' =>$message,
            'data' =>$data,

        ];
        http_response_code($status_code);
        return json_encode($responsemessage);

    }


}