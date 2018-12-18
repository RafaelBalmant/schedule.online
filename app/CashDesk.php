<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashDesk extends Model
{
    protected $fillable = ['id', 'total_money', 'input_money', 'out_money','starting_money','final_money'];

}
