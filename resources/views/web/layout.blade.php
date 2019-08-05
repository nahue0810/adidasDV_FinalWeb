<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AdidasDv</title>
    <base href="{{ asset('public') }}">
    <link rel="icon" href="img/estilo/if_adidas_shirt_62730.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    @include("web.partials.css")


    @yield("css")

</head>

<body id="fondo">
@php
    $navbar = [
        "Inicio" => "web.index",
        "Articulos" => "web.articulos",
        "Sucursales" => "web.sucursales",
        "Contacto" => "web.contacto"
    ];
@endphp

@include("web.partials.header",["secciones" => $navbar])

@include("web.partials.css")

@yield("css")


{{-- CONTENIDO --}}

@yield("contenido")

@include("web.partials.js")

@yield("js")

</body>

</html>