@extends('layouts._FormCreateClient')
@section('action')
    {{ route('client.create') }}
@endsection

@section ('value-btn')
    Cadastrar
@endsection