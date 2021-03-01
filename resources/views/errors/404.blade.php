@extends('layout')

@section('title', 'Pagina niet gevonden')


@section('content')

	<h1>Error 404: Deze pagina bestaat niet</h1>


	<a href="{{ route('Index') }}" class="mt-3 btn btn-primary">Terug naar home</a>

@stop