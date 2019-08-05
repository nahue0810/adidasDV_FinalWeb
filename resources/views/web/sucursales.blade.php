@extends("web.layout")


@section("contenido")
<section id="Productos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-left">SUCURSALES</h1>
                </div>
            </div>
            
            <article class="card-columns">
               
            @forelse($sucursales  as $suc)         
                    <div class="card border-default">
                       <div class="card-body">
                            <img src="{{ $suc->imagen }}" alt="" class="img-fluid">
                            <h4 class="card-title">{{ ucfirst(trans($suc->nombre)) }}</h4>
                            <p>{{ $suc->descripcion }}</p>
                        </div>
                    </div>                
            @empty
                    <p class="text-danger">No tenemos sucursales cargados</p>
            @endforelse
            </article>
        </div>
    </section>


@endsection