<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

      protected $fillable = ['label', 'imagePath'];

      public function categories()
      {
          return $this->belongsTo('App\Product');
      }

}
