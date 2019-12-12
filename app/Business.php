<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $gaurded = ['id'];

    public function businessOwner()
    {
        return $this->belongsTo('App\BusinessOwner');
    }
}
