@extends('layout')

@section('title', 'Biedingen')


@section('content')

	<h1>Biedingen voor Lot {{ $item->id }} - {{ $item->title }}</h1>
	
	<ul class="list-group col-md-6">
		@foreach ($bids as $bid)
	        <li class="list-group-item">
	            {{ $bid->user->firstname }} {{ substr($bid->user->lastname, 0, 1) }}: € {{ $bid->price }}
	        </li>
	    @endforeach
	</ul>

@stop