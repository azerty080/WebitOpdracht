@extends('layout')

@section('title', 'Home')


@section('content')

	<h1>Show items</h1>


	<ul>
		@foreach ($items as $item)
	        <li>
	            
	            <div class="url">
	                <h2>
	                	<a href="{{ '/admin/item/' . $item->id }}" class="urlTitle">{{ $item->id }} - {{ $item->title }}</a>
	                </h2>
	            </div> 


	        </li>
	    @endforeach
	</ul>




@stop