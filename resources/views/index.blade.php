@extends('layout')

@section('title', 'Home')


@section('content')

	<h1>Alle Voorwerpen</h1>


	
	<ul class="list-group">
		@foreach ($items as $item)
	        <li class="list-group-item">
	            <a href="{{ '/lot-' . $item->id }}" class="urlTitle">
	                <h2>Lot {{ $item->id }} - {{ $item->title }}</h2>

	        		<img src="{{ $item->images->first()->path }}" width="200px">
				</a>

				<h3 class="mt-3 mb-3">Hoogste bod:
					@if (count($item->bids) == 0)
						Nog niets geboden
					@else
						€ {{ $item->bids->max('price') }}
					@endif
				</h3>

	        </li>
	    @endforeach
	</ul>

@stop