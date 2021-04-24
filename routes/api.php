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
$app->router->get('/contact',[MyController::class,'index']);
$app->router->post('/post',[MyController::class,'post']);
$app->router->put('/post',[MyController::class,'put']);
$app->router->patch('/post',[MyController::class,'patch']);
$app->router->delete('/post',[MyController::class,'delete']);
$app->router->view('/post',[MyController::class,'view']);//not implement in php
$app->router->options('/post',[MyController::class,'options']);
/*
 * for test route
 */

$app->router->get('/login',[AuthController::class,'index']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'store']);
$app->router->put('/update-profile',[AuthController::class,'update']);
$app->router->delete('/profile',[AuthController::class,'delete']);




