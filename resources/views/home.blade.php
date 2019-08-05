@extends('web.layout')

@section('contenido')
<hr>
<hr>
<hr>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Bienvenido!!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Ha iniciado sesión!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
