<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $gaurded = ['id'];

    public function owner()
    {
        return $this->belongsTo('App\Owner')->with('user');
    }
}
