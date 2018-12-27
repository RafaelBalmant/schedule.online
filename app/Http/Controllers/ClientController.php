<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function createClientView()
    {
        return view('Create.CreateClient');
    }

    public function createClient(ClientRequest $request)
    {
        $client=$request->only('name', 'phone');
        $adress=$request->only('city', 'street', 'number');
        $adress=implode(' - ',$adress);
        $client['adress']=$adress;
        preg_match_all('/\d/', $client['phone'], $phone);
        $phone=implode('',$phone[0]);
        $phone= (string) $phone;
        $client['phone']=$phone;
        Client::create($client);
        return redirect(route('client.create.view'));

    }

    public function showClients()
    {

    }


    public function showClientsView()

    {
        $clients=Client::all();
        return view('search.SearchClient', compact('clients'));
    }


    public function teste()
    {
        return view('teste');
    }

}
