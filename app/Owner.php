<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $guarded = ['id'];
    protected $table = 'business_owners';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function businesses()
    {
        return $this->hasMany('App\Business');
    }
}
