@extends('layout')

@section('title', 'Biedingen')


@section('content')

	<h1>Uw Biedingen</h1>


	
	<ul class="list-group col-md-6">
		@foreach ($bids as $bid)
	        <li class="list-group-item">
	            <h2>
	            	<a href="{{ route('ItemDetail', ['id' => $bid->item_id]) }}" class="">{{ $bid->item->title }}: € {{ $bid->price }}</a>
	            </h2>
	        </li>
	    @endforeach
	</ul>


@stop