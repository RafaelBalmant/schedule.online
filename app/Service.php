<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Service extends Model
{
    protected $fillable = ['id', 'title', 'description', 'value',];

    use SoftDeletes;


    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
