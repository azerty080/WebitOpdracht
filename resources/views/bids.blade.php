@extends('layout')

@section('title', 'Biedingen')


@section('content')

	<h1>Biedingen</h1>


	
	<ul>
		@foreach ($bids as $bid)
	        <li>
	            <div class="">
	                <h3>
	                	<a href="{{ route('ItemDetail', ['id' => $bid->item_id]) }}" class="">{{ $bid->item->title }}</a>
	                </h3>
	                <p>€ {{ $bid->price }}</p>
	            </div> 
	        </li>
	    @endforeach
	</ul>


@stop