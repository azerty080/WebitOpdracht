@extends('layout')

@section('title', 'Home')


@section('content')

	<h1>Admin Home</h1>


	<a href="{{ route('AdminItems') }}">Lijst van voorwerpen</a>

	<a href="{{ route('AdminAddItem') }}">Voorwerp toevoegen</a>


@stop