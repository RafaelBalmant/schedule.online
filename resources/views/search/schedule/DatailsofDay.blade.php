@extends('layouts._LayoutDefault')

@section('content')
    <form action="{{ route("schedule.confirm") }}" method="post">
        @csrf
        <div>
            <h3> Detalhes do dia </h3>
            @foreach($schedule as $record)
                <div>
                    <p> Horario: {{ $record->time}}</p>
                    <p> Cliente: {{ $record->client->name}}</p>
                    <p> Serviço: {{ $record->service->title}}</p>
                </div>

            @endforeach
        </div>
        <div class="div-center-schedule">
            <h3>MARCAR UM SERVIÇO</h3>
            <div class="div-form-schedule-confirm">
                <label for="">Cliente</label>
                <select name="client" id="">
                    @foreach($clients  as $client)
                        <option value="{{ $client->name }}" name="client">{{ $client->name }}</option>
                    @endforeach
                </select>
                <label for="">Serviço</label>
                <select name="service" id="">
                    @foreach($services  as $service)
                        <option value="{{ $service->title}}">{{ $service->title}}</option>
                    @endforeach
                </select>
                <label for="">Data</label>
                <input type="text"  readonly value="{{ $dateUser }}">
                <input type="hidden" name="date" value="{{ $dateQuery }}" >
                <label for="">Horario</label>
                <input type="text" id="time" name="time" onchange="checkValue()">
                @foreach($errors->all() as $error )
                    <p class="error">{{ $error }}</p>
                @endforeach
                <span style="display: none" class="error" id="error">Atenção! Esse Horario não é valido</span>
                <input type="submit" class="mt-3" value="cadastrar">
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script src="/vanilla-masker/vanilla-masker.min.js"></script>


    <script>
        var input= document.getElementById("time");
        var msgerro= document.getElementById("error")
        VMasker(input).maskPattern("99:99");

        function checkValue()
        {
            if(input.value.charAt(0) > 2 || input.value.length < 4 ) {
                msgerro.style.display = "inline-block";
                input.value= null;
            }
            else {
                msgerro.style.display = "none";

            }




        }









    </script>
@endsection