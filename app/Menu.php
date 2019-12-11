<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['price','food_name'];
    protected $table = 'bill';
    protected $guarded = [];
    public $timestamps = false;
}
