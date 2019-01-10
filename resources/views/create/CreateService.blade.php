@extends('layouts._LayoutDefault')
<form action="{{ route('service.create') }}" method="post">
    @csrf
    <div class="form-register-client shadow-lg">
        <div style="color: white; font-size: 25px; margin-bottom: 20px">
            Cadastro de Serviços
        </div>
        <label for="">Serviço:</label>
        <input name="title" type="text" class="form-control">
        @foreach($errors->get('title') as $error )
            <p class="error">{{ $error }}</p>
        @endforeach
        <label for="">Descrição:</label>
        <input name="description" type="text" class="form-control">
        @foreach($errors->get('description') as $error )
            <p class="error">{{ $error }}</p>
        @endforeach
        <label for="">Valor:</label>
        <div class="div-cash">
            <span class="fas fa-dollar-sign icon-cash"></span>
            <input id="value" name="value" type="text" class="form-control input-cash" >
        </div>
        @foreach($errors->get('value') as $error )
            <p class="error">{{ $error }}</p>
        @endforeach
        <input type="submit" class="btn-default" value="Cadastrar">
    </div>
</form>
<script src="/vanilla-masker/vanilla-masker.min.js"></script>
<script>
    VMasker(document.getElementById("value")).maskMoney();
</script>

