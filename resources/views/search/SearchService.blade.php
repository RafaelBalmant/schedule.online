@extends('layouts._LayoutDefault')

<div class="btn-clients" >
    <a href="{{ route('service.create.view') }}" class="btn-new-client mr-2" style="font-size: 16px"><span class="far fa-edit mr-2"></span>Castrar novo serviço</a>
</div>
<div class="div-services">
    <div style=" width: 100%; display: flex ; flex-direction: row; flex-wrap: wrap; justify-content: space-evenly;">
        @foreach($services as $service)
            <div class="service shadow-lg" >
                <p style="font-size: 25px; white-space: normal; color: white"><span class="fas fa-concierge-bell mr-2"></span>{{ $service->title }}</p>
                <p style="font-size: 20px; color: white">Valor: R$ {{ str_replace('.', ',', $service->value)}} </p>
                <a  class="btn btn-cancel mt-2" style="width: 100%" onclick="confirmDeleted()"><b>Deletar</b></a>
                <input type="hidden" value="{{ $service->id }}" id="service-id">
            </div>
        @endforeach
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function confirmDeleted()
    {
        swal({
            title: "Tem certeza que deseja deletar esse serviço?",
            text: "Uma vez que esse serviço seja deletado, ele não podera ser restaurado!",
            icon: "warning",
            buttons: ["Voltar", "Deletar"],
       //     dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var id = document.getElementById('service-id').value;
                    window.location.href="http://localhost:8000/deletar/serviço/" + id;
                } else {
                    swal({
                        text: "O serviço não foi deletado",
                        button: "ok",
                        }
                    );

                };
            });
    }
</script>
