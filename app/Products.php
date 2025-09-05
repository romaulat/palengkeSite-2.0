<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'product_name',
        'min_price',
        'max_price',
        'srp',
        'category_id',
        'type',
        'status',
    ];


    public function category(){
        return $this->belongsTo(Categories::class);
    }

    public function seller_products(){
        return $this->hasMany(SellerProduct::class , 'product_id');
    }

    public function carts(){
        return $this->hasMany(Cart::class );
    }
}
