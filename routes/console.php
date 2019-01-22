<?php

use Illuminate\Foundation\Inspiring;
use Carbon\CarbonImmutable;


/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('dates', function(){

    $now= CarbonImmutable::now();
    $value=0;

    $now->locale('pt_BR')->setTimezone('America/Sao_Paulo');

    while ($value <= 346)
    {
        $day=$now->addDay($value)
            ->locale('pt_BR')
            ->setTimezone('America/Sao_Paulo')
            ->isoFormat("dddd, D MMMM  YYYY");
        \App\Schedule::create(['date' => $day]);
        $value +=1;
    }
});