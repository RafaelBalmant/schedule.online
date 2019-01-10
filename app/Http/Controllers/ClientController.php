<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\ClientUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function createClientView()
    {
        return view('create.CreateClient');
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
        Client::create($client)->get();

        return redirect(route('clients.show.view'));
    }



    public function showClientsView()

    {
        $clients=Client::orderBy('name')->paginate(30);
        return view('search.SearchClient', compact('clients'));
    }

    public function searchOnlyUser(Request $request)
    {
        $client= $request->only('name');
        $client=$client['name'];
        $clients= Client::where('name' , 'LIKE' , "$client%")->paginate(30);
        $count= $clients->count();
        if ($count === 0)
            return redirect(route('clients.show.view'));
        else
            return view('search.SearchClient', compact('clients'));


    }

    public function detailsClientView($id)
    {
        $client= Client::find($id);
        return view('search.DetailsClient', compact('client'));
    }

    public function clientEditView($id)
    {
        $client= Client::find($id);
        $adress=$client->adress;
        $adress=explode(' - ', $adress);
        return view('edit.EditClient', compact('client' , 'adress'));
    }

    public function updateClient(ClientUpdateRequest $request , $id)
    {

        $client=$request->only('name', 'phone');
        $adress=$request->only('city', 'street', 'number');
        $adress=implode(' - ',$adress);
        $client['adress']=$adress;
        preg_match_all('/\d/', $client['phone'], $phone);
        $phone=implode('',$phone[0]);
        $phone= (string) $phone;
        $client['phone']=$phone;
        Client::where('id', $id)->update($client);

        return redirect(route('clients.show.view'));

    }

    public function clientDeleted($id)
    {
        Client::where('id', $id)->delete();
        return redirect(route('clients.show.view'));
    }



}
