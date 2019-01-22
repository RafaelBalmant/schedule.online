<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ScheduleRequest;
use App\Schedule;
use App\Service;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;
use Carbon\CarbonTimeZone;
use Validator;
use function GuzzleHttp\Promise\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;





class ScheduleController extends Controller
{
    public function scheduleView(){

        $now= CarbonImmutable::now();
        $start=$now->startOfYear();
        $end=$now->endOfYear();
        $months = CarbonPeriod::create($start, '1 month', $end)->locale('pt_BR');

        return view("search.schedule.Months", compact("months"));

    }

    public function scheduleMonthView($month)
    {

        $mes=$month;
        $month=trans("months.$month");
        $month=CarbonImmutable::parse($month);
        $start=$month->startOfMonth();
        $end=$month->endOfMonth();
        $thisMonth=CarbonPeriod::create($start, '1 days', $end)->locale('pt_BR');

        return view("search.schedule.Days", compact("thisMonth", "mes"));

    }

    public function scheduleDetailsDayView($mes,$day)
    {
        $month=trans("months.$mes");
        $date = $day ." ". $month ." ".CarbonImmutable::now()->isoFormat("YY");
        $date=CarbonImmutable::parse($date);
        $dateQuery=$date->isoFormat("DD MM Y");
        $dateUser=$date->locale('pt_BR')->isoFormat("dddd - D/M/Y");
        $clients=Client::orderBy('name', 'asc')->get();
        $services=Service::orderBy('title', 'desc')->get();
        $schedule=Schedule::where('date', $dateQuery)->orderBy('time', 'asc')->get();
        return view("search.schedule.DatailsofDay", compact("date", "clients", "dateUser", "services", "schedule", "dateQuery"));

    }


    public function scheduleConfirm(ScheduleRequest $request)
    {

        $date= $request->date;
        $date= explode( " ", $date);
        $day= $date[0];
        $month= $date[1];
        $year= $date[2];
        $time= $request->time;
        $date=CarbonImmutable::createFromDate($time ,$year, $month, $day);
        return $date;
        $time=$date->isoFormat("H mm");
        $date=$date->isoFormat("DD MM Y");
        $client=Client::where("name", $request->client)->first();
        $client=$client->id;
        $service=Service::where("title", $request->service)->first();
        $service=$service->id;
        $register=["time" => $time , "date" => $date, "service_id" => $service, "client_id" => $client];
        $msg=["time.unique" => "error"];
        $validador=Validator::make($register,[
            "time" => [
                'required'
                ,Rule::unique('schedule')->where(function ($query) use($time,$date){
                return $query->where("time", $time)
                    ->where("date", $date);
                }),
            ],
        ]);

        if($validador->fails())
        {
            return "deu merda";
        }

        Schedule::create(["time" => $time , "date" => $date, "service_id" => $service, "client_id" => $client]);
        return "registro criado com sucesso";



    }
}
