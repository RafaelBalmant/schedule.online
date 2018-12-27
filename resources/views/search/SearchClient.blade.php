@extends('layouts._LayoutDefault')

@section('content')
    <div class="div-search-client-center">
            <table class="table table-striped table-search-client">
                <thead>
                    <tr style="color: white">
                        <th style="font-size: 19px; width: 30%">
                            Nome
                        </th>
                        <th>
                            <span>Buscar cliente:</span>
                            <input type="text" class="form-control" style="width: 50%; display: inline-block">
                            <input type="submit" value="pesquisar" class="btn btn-success" style="display: inline-block; width: 20%;">
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr style="color: white">
                        <td style="font-size: 19px">
                            {{ $client->name }}
                        </td>
                        <td style="text-align: center" >
                            <a href="" class="btn btn-success">Detalhes</a>
                            <a href="" class="btn btn-info buttons-client-search" style="color: white">Horarios</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
@endsection