@extends ('errors::layout')

@section('title','404')


@section('message','Página no encontrada')

<a class="nav-link" href="{{ route('blog') }}">Ir al Inicio</a>