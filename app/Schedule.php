<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['id','time','date','service_id','user_id','client_id'];

    public $table="schedule";

    public function service()
    {
        return $this->belongsTo('App\Service');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}
