@extends('layouts._LayoutDefault')

@section('content')
    <div class="div-center-details-client">
        <div class="details-client shadow-lg" style="color: white">
            <div class="details-client-info">
                <div style="display: inline-block; float: left; margin-right: 5px">
                    <span class="fas fa-user-circle" style=" font-size: 40px"></span>
                </div>
                <div style="width: 87%; display: inline-block">
                    <input type="hidden" value="{{ $client->id }}" id="client-id">
                    <p style="font-size: larger">Nome: {{ $client->name }}</p>
                    <p style="font-size: larger">Telefone: {{ $client->phone}}</p>
                    <p style="font-size: larger">Endereço: {{ $client->adress}}</p>
                </div>

            </div>
            <a href="{{ route('client.edit.view', $client->id) }}" class="btn buttons-client-search"
               style="color: white">Editar dados</a>
            <a class="btn btn-cancel mt-2" style="color: white" onclick="confirmDeleted()">Deletar</a>
        </div>
    </div>
@endsection
@section('js')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function confirmDeleted() {
            swal({
                title: "Tem certeza que deseja deletar esse cliente?",
                text: "Uma vez que esse cliente seja deletado, ele não podera ser restaurado!",
                icon: "warning",
                buttons: ["Voltar", "Deletar"]
                //     dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var id = document.getElementById('client-id').value;
                        window.location.href = "http://localhost:8000/deletar/cliente/" + id;

                    } else {
                        swal({
                                text: "O serviço não foi deletado",
                                button: "ok",
                            }
                        );

                    }

                });


        }
    </script>

@endsection