<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'birthday',
        'age',
        'gender',
        'user_id',
        'seller_type',
        'market_id',
        'category_id',
        'contact',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function seller_stalls(){
        return $this->hasOne( SellerStall::class);
    }

    public function seller_products(){
        return $this->hasMany( SellerProduct::class);
    }

    public function stall_appointments(){
        return $this->hasMany( StallAppointment::class);
    }

    public function market(){
        return $this->belongsTo( Market::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class );
    }

    public function orders(){
        return $this->hasMany(Order::class );
    }

    public function category(){
        return $this->belongsTo(Categories::class );
    }

    public function messages(){
        return $this->hasMany(Message::class );
    }
}
