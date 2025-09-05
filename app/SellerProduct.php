<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SellerProduct extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'seller_id',
        'custom_title',
        'description',
        'seller_id',
        'product_id',
        'price',
        'type',
        'image',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'average_ratings',
        'stock',
        'featured',
    ];

    public function product(){
        return $this->belongsTo(Products::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class );
    }

    public function comments(){
        return $this->hasMany(Comments::class );
    }

    public function order_products(){
        return $this->hasMany(OrderProduct::class );
    }
}
