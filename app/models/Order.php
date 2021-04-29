<?php


namespace App\models;


class Order extends \Illuminate\Database\Eloquent\Model
{
    protected  $table ='orders';

    public function Product()
    {
        return $this->hasMany(Product::class, 'id','items->product_id');
    }

    public function User()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }


}