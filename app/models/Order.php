<?php


namespace App\models;


class Order extends \Illuminate\Database\Eloquent\Model
{
    protected  $table ='orders';

    public function Product()
    {
        return $this->hasMany(Product::class, 'id','items->product_id');
    }


}