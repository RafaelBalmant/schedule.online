<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['id', 'title', 'description', 'value',];



    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
