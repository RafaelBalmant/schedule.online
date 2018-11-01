<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['id','time','date','service_id','user_id','client_id'];

    public $table="schedule";

    public function Services()
    {
        return $this->belongsTo('App\Service');
    }

    public function Users()
    {
        return $this->belongsTo('App\User');
    }

    public function Client()
    {
        return $this->belongsTo('App\Client');
    }

}
