<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Client extends Model
{
    protected $fillable = ['id', 'name', 'phone', 'adress'];

    use SoftDeletes;

    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
