@extends('layouts._LayoutDefault')
@section('content')
    <div class="btn-clients">
        <a href="{{ route('client.create.view') }}" class=" btn-new-client mr-2"><span class="fas fa-user-edit mr-2"></span>Novo Cliente</a>
    </div>
    <div class="div-search-client-center">
        <div class="info-search-client" ><span class="fas fa-user mr-2 ml-1 "></span><p>Clientes</p></div>
        <table class="table table-striped table-search-client shadow-lg">
                <thead>
                    <tr>
                        <th class="name-table-search mt-1">
                            <form action="{{ route('client.show.view') }}" method="post" >
                                @csrf
                                <label for="" style="color: white; font-size: large">Pesquisar:</label>
                                <input type="text" class="form-control" placeholder="Nome" name="name">
                                <input type="submit" class="btn mt-2" id="btn-search-form" value="Pesquisar">
                            </form>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr style="color: white" class="table-client-name">
                        <td style="font-size: 15px;">
                            {{ $client->name }}
                            <div class="mt-2">
                                <a href="{{ route('client.details.view', $client->id) }}" class="btn buttons-client-search" style="color: white">Detalhes</a>
                                <a href="" class="btn buttons-client-search" style="color: white">Horarios</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        <div>
            {{ $clients->links() }}
        </div>
    </div>
@endsection
