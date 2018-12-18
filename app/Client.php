<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['id', 'name', 'phone', 'adress',];
    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
