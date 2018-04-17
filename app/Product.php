<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['imagePath', 'title', 'description', 'price', 'category'];

    public function post()
    {
        return $this->belongsTo('App\Product');
    }

}
