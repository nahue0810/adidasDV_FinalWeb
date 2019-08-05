@extends("panel.layout")

@section("contenido")
   
<section id="Productos">
    <div class="container">
        <div class="row mt-5">
          <div class="col-12">
            <h1 class="h3">Articulos</h1>
                <a href="{{ route('articulos.create') }}" class="btn btn-primary float-right btn-sm">Nuevo articulo</a>
          </div>
        </div>

        <div class="row mt-2 mb-5">

            <div class="col-12">
                <div class="table-responsive">    
                    <table class="table table-bordered table-sm fs-90">
                        <thead class="thead-light text-center">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>imagen</th>
                            <th>Tipo de articulo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @forelse($articulos as $art)
                            <tr>
                                <td>{{ $art->id_articulo }}</td>
                                <td>{{ ucfirst(trans($art->nombre)) }}</td>
                                <td><img src="{{ $art->imagen }}" alt="{{ $art->nombre }}" width="50"></td>
                                <td>{{ $art->TipoArticulo->nombre }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-success dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{ route('articulos.edit',$art->id_articulo) }}">Editar</a>
                                            <form action="{{ route('articulos.destroy',$art->id_articulo) }}" method="post">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="dropdown-item">Borrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td colspan="6" class="text-center text-danger">No hay articulos cargados</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>

        </div>
        <div class="col-12">
                <a href="{{ route('panel.index') }}" class="btn btn-dark float-right btn-lg">Volver al inicio</a>
        </div>        
    </div>
</section>
@endsection