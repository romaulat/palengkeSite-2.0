<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    //
    protected $fillable=[
        'title',
        'description',
        'url',
        'label',
        'image',
    ];
}
