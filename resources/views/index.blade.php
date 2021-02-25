@extends('layout')

@section('title', 'Home')


@section('content')

	<h1>home</h1>


	
	<ul>
		@foreach ($items as $item)
	        <li>
	            
	            <div class="url">
	                <h2>
	                	<a href="{{ '/lot-' . $item->id }}" class="urlTitle">{{ $item->title }}</a>
	                </h2>
	            </div> 


				@foreach ($item->images as $image)

        			<img src="{{ $image->path }}" width="200px">

	    		@endforeach


	    		@if ($item->bids)
	    			<p>€ {{ $item->bids->max('price') }}</p>
	    		@else
	    			<p>Nog niets geboden</p>
	    		@endif

	        </li>
	    @endforeach
	</ul>


@stop