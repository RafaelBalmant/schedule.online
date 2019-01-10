@extends('layouts._FormCreateClient')
@section('action')
    {{ route('client.update', $client->id) }}
@endsection
@section('client-name'){{ $client->name }}@endsection
@section('client-phone')
    {{ $client->phone }}
@endsection
@section('client-city'){{ $adress[0]}}@endsection
@section('client-street'){{ $adress[1]}}@endsection
@section('client-number'){{ $adress[2]}}@endsection
@section ('value-btn')
    Enviar
@endsection