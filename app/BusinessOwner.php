<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessOwner extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
