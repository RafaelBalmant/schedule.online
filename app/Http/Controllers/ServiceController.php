<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function serviceView()
    {
        $services=Service::all();
        return view('search.SearchService', compact('services'));
    }

    public function serviceCreateView()
    {

        return view('create.CreateService' );
    }

    public function serviceCreate(ServiceRequest $request)

    {
        $value=$request->value;
        $request=$request->only('value', 'title', 'description');
        $value_float=floatval(str_replace(',','.' , $value ));
        $value_float=number_format($value_float, 3 );
        $request['value']= $value_float;
        Service::create($request);
        return redirect(route('service.view'));


    }

    public function serviceDeleted($id)
    {
        Service::where('id', $id)->delete();
        return redirect(route('service.view'));

    }
}
