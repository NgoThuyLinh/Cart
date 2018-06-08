<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $filltable=['name','price','quantity'];
    public static function getAll(){
    	$products= Product::paginate(env('PAGES'));
    	return $products;
    }
}
