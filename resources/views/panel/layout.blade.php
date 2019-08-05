<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AdidasDv</title>
    <base href="{{ asset('') }}">
    <link rel="icon" href="img/estilo/if_adidas_shirt_62730.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    @include("panel.partials.css")


    @yield("css")

</head>

<body id="fondo">
@include("panel.partials.header")

@include("web.partials.css")

@yield("css")
<main>
   
   @yield("contenido")

   @if ($errors->any())
     <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
     </div>
    @endif
   

</main>


@include("panel.partials.js")
</body>
</html>