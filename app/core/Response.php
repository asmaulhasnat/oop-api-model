<?php


namespace App\core;
use Illuminate\Http\Response as Rs;

class Response
{
    public function setStatusCode(int $code){
        return http_response_code($code);

    }
}