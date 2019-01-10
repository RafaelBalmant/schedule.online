@extends('layouts._LayoutDefault')
@section('content')
    <form action="@yield('action')" method="post">
        @csrf
        <div class="form-register-client shadow-lg">
            <div class="register-client">
                <span class="fas fa-user mr-2"></span>Cadastro do Cliente
            </div>
            <label for="">Nome:</label>
            <input type="text" class="form-control" name="name" placeholder="Insira o nome " value="@yield('client-name')" >
            @foreach($errors->all() as $error )
                <p class="error">{{ $error }}</p>
            @endforeach
            <label for="">Telefone:</label>
            <input type="text" class="form-control phone" name="phone" placeholder="Insira o telefone" value="@yield('client-phone')">
            <label for="">Endereço:</label>
            <input type="text" class="form-control" name="city" placeholder="Cidade" value="@yield('client-city')">
            <input type="text" class="form-control" name="street" placeholder="Rua" value="@yield('client-street')">
            <input type="number" class="form-control" name="number" placeholder="Numero" value="@yield('client-number')">
            <input type="submit" class="btn-default mt-3"  value="@yield('value-btn')" style="width: 100%">
        </div>
    </form>
@endsection





















@section('js')
    <script src="https://cdn.jsdelivr.net/npm/vanilla-text-mask@5.1.1/dist/vanillaTextMask.min.js"></script>
    <script>
        var commonMask = ['(', /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]
        var newMask = ['(', /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]

        var chooseMask = function (value) {
            if (value.length > 14) return newMask
            return commonMask
        }

        // Assuming you have an input element in your HTML with the class .myInput
        var myInputs = document.getElementsByClassName('phone')

        for (let i = 0; i < myInputs.length; i++) {
            var maskedInputController = vanillaTextMask.maskInput({
                inputElement: myInputs[i],
                mask: chooseMask,
            })
        }
    </script>
@append