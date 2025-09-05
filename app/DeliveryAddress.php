<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    //
    protected $fillable = [
        'stnumber',
        'stname',
        'barangay',
        'city',
        'province',
        'country',
        'zip',
        'longitude',
        'latitude',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
