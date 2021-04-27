<?php


/*
 * calling route throw controller
 * $app->router->get('url',[controllername::class,'method']);
 */


/*
 * Calling throw callback function
 *
 * $app->router->post('url',function(){
 * return something
});
 */

/*
 * Render only view
 * $app->router->get('url','view_name');
 */

/*
 * use controller here
 */

use App\core\Application;
use App\http\controllers\AuthController;
use App\http\controllers\MyController;
use App\http\controllers\ProfileController;
use App\http\controllers\AdminController;
use App\http\controllers\OrderController;

/*
* use controller here
*/




$app->router->get('/','home');

$app->router->get('/about',function(){
  return Application::$app->router->renderView('about');
});
/*
 * for test route
 */
//$app->router->get('/contact',[MyController::class,'index']);
//$app->router->post('/post',[MyController::class,'post']);
//$app->router->put('/post',[MyController::class,'put']);
//$app->router->patch('/post',[MyController::class,'patch']);
//$app->router->delete('/post',[MyController::class,'delete']);
//$app->router->view('/post',[MyController::class,'view']);//not implement in php
//$app->router->options('/post',[MyController::class,'options']);
/*
 * for test route
 */

$app->router->post('/login',[AuthController::class,'login']);
$app->router->post('/register',[AuthController::class,'store']);

//authenticated route
$app->router->post('/profile',[ProfileController::class,'index']);




$app->router->post('/category',[AdminController::class,'categoryAll']);
$app->router->post('/category/create',[AdminController::class,'createCategory']);
$app->router->post('/category/edit',[AdminController::class,'editCategory']);
$app->router->post('/category/update',[AdminController::class,'updateCategory']);



$app->router->post('/product',[AdminController::class,'allProduct']);
$app->router->post('/product/create',[AdminController::class,'createProduct']);
$app->router->post('/product/edit',[AdminController::class,'editProduct']);
$app->router->post('/product/update',[AdminController::class,'updateProduct']);
$app->router->post('/admin/order',[AdminController::class,'allOrders']);
$app->router->post('/admin/order/update',[AdminController::class,'updateOrder']);
$app->router->post('/admin/view',[AdminController::class,'viewOrder']);


$app->router->post('/order',[OrderController::class,'index']);
$app->router->post('/order/check',[OrderController::class,'getStatus']);
$app->router->post('/order/create',[OrderController::class,'store']);





