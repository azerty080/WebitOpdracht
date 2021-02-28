@extends('layout')

@section('title', 'Bedankt')


@section('content')

	<h1>Bedankt, je bod is geplaatst!</h1>


	<a href="{{ route('Index') }}" class="mt-3 btn btn-primary">Bekijk andere voorwerpen</a>

@stop