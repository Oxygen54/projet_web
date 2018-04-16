<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function subscribes()
    {
        return $this->belongsTo('App\Subscribe');
    }
}
