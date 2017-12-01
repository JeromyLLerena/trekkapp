@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registro de nuevo usuario</h3>
                    </div>
                    <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form role="form" action="{{route('auth.register')}}" method="post">
                        {!! csrf_field() !!}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="first_name" placeholder="Nombres" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="last_name" placeholder="Apellidos" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <label class="verify-number"></label>
                                    <input class="form-control" placeholder="Telefono" name="phone" type="text">
                                    <a href="#" class="btn btn-default form-control send-button">Enviar código</a>
                                    <input type="text" name="code" placeholder="Código de verificación" class="form-control">
                                    <a href="#" class="btn btn-default form-control verify-button">Verificar número</a>
                                </div>
                                <div c
                                lass="form-group">
                                    <input class="form-control" placeholder="Direccion" name="address" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirmación de contraseña" name="password_confirmation" type="password" value="">
                                </div>
                                <input type="hidden" name="request_id">
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block registrar">Registrarme</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_scripts')
    <script type="text/javascript">
        $('.registrar').attr('disabled', 'disabled');
        var request_id = 0;

        $('.send-button').click(function(){
            $.ajax({
                //crossDomain: true,
                method: "POST",
//                url: "https://api.nexmo.com/verify/json",
                url: "{{env('APP_URL')}}" + "/send",
                data: {
                    phone: $('input[name="phone"]').val(),
                    _token : "{{csrf_token()}}"
                }
            }).done(function(data) {
                var response = JSON.parse(data);
                $('input[name="request_id"]').val(response.request_id);
                var status = response.status;
            }).fail(function() {
                alert("Error, intente nuevamente.");
            });
        });

        $('.verify-button').click(function(){
            $.ajax({
                //crossDomain: true,
                method: "POST",
//                url: "https://api.nexmo.com/verify/json",
                url: "{{env('APP_URL')}}" + "/verify",
                data: {
                    request_id: $('input[name="request_id"]').val(),
                    code : $('input[name="code"]').val(),
                    _token : "{{csrf_token()}}"
                }
            }).done(function(data) {
                var response = JSON.parse(data);
                var status = response.status;
                if (response.status != 0) {
                    $('.registrar').attr('disabled', 'disabled');
                } else {
                    $('.registrar').attr('disabled', false);
                }
            }).fail(function() {
                alert("Error, intente nuevamente.");
            });
        });
    </script>
@endsection
