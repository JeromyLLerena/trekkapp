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
                                    <!--<a href="#" class="btn btn-default form-control verify-button">Verificar número</a>-->
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Direccion" name="address" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirmación de contraseña" name="password_confirmation" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Registrarme</button>
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
        var request_id = 0;

        $('.verify-button').click(function(){
            $.ajax({
                crossDomain: true,
                method: "POST",
                dataType: "jsonp",
                url: "https://api.nexmo.com/verify/json",
                data: JSON.stringify({
                    api_key: "{{env('NEXMO_API_KEY')}}",
                    api_secret: "{{env('NEXMO_SECRET_KEY')}}",
                    number: "51" + $('inut[name="phone"]').val(),
                    brand: "Trekk App"
                })
            }).done(function(data) {
                request_id = data.request_id;
                console.log(data.request_id);
            }).fail(function() {
                alert("Error, intente nuevamente.");
            });
        });
    </script>
@endsection
