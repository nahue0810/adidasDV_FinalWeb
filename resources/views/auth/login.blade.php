@extends('web.layout')

@section('contenido')
<hr>
<hr>
<hr>
<hr>
<section id="login">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Iniciar Sesión') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar Sesión') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="container">
<div class="row justify-content-center">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
           <div class="panel-heading">
             <h1 class="panel-title">Inicio de sesión</h1>
           </div>
           
           <div class="panel-body">
               <form method="POST" action="{{ route('login') }}">
                  {{ csrf_field() }}
                  
                   <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                       <label for="email">Correo Electrónico</label>
                       <input class="form-control" 
                           type="email" 
                           name="email"
                           value="{{ old('email') }}" 
                           placeholder="Ingresa tu correo electrónico">
                       {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                   </div>
                   <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                       <label for="password">Contraseña</label>
                       <input class="form-control" 
                           type="password" 
                           name="password" 
                           placeholder="Ingresa tu contraseña">
                       {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                   </div>
                   <button class="btn btn-primary btn-block">Acceder</button>
               </form>
           </div>
        </div>
    </div>
</div>
</div>-->
</section>
@endsection
