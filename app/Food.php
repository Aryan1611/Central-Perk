<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['price','food_name','quantity','category','description','serves','contents'];
    protected $table = 'food';
    protected $guarded = [];
    public $timestamps = false;
}
