@extends("panel.layout")

@section("contenido")

<section id="Productos">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="h3">Bienvenidos al panel de control!</h1>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12">
                <p class="text-justified">Aqui podra ver el listado de todos los articulos y sucursales que se encuentran en nuestra web.<br> Una vez acceda a listado deseado, va a poder agregar un nuevo producto o nueva sucursal, modificar un articulo o sucursal existente,  o bien  eleminar el articulo o sucursal de ser necesario.</p>                
                <a class="btn btn-primary" href="{{ route('articulos.index') }}">Listado de articulos</a>
                
                <a class="btn btn-primary" href="{{ route('sucursales.index') }}">Listado de sucursales</a>
            </div>
        </div>
        
    </div>
</section>
@endsection