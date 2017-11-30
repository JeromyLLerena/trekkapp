@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingresa el código enviado a tu celular</h3>
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
                        <form role="form" action="{{route('auth.login')}}" method="post">
                            {!! csrf_field() !!}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="código" name="email" type="email" autofocus>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="success" class="btn btn-lg btn-success btn-block">continuar</button>
                                <div>
                                <a class="btn btn-lg btn-block btn-default" href="#">
                                  cancelar
                                </a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
