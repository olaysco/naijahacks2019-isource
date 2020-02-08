<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    protected $guarded = ['id'];
    protected $table = 'business_investors';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
