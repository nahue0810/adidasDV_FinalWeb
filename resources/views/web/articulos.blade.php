@extends("web.layout")


@section("contenido")

<section id="Productos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-left">ARTICULOS</h1>
                </div>
            </div>
                       
            <article class="row">
            @forelse($articulos  as $art)                  
                    <div class="col-xs-12 col-sm-5 col-md-3">
                        <a data-fancybox="calzado" href="{{ $art->imagen }}">
                        <img src="{{ $art->imagen }}" alt="" class="img-fluid rounded">
                        </a>
                    </div>                
            @empty
                    <p class="text-danger">No tenemos articulos cargados</p>
            @endforelse
            </article>
        </div>
    </section>
@endsection