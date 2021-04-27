<?php


namespace App\models;
use App\models\Category;

class Product extends \Illuminate\Database\Eloquent\Model
{
    Protected $table ='products';
    public function Category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

}