@extends('layout')

@section('title', 'Detail')


@section('content')

	<h1>Detail Item</h1>





	<h1>Lot {{ $item->id }} - {{ $item->title }}</h1>


	@foreach ($item->images as $image)

		<img src="{{ $image->path }}" width="200px">

	@endforeach


	<h3>Huidig bod</h3>
	@if ($item->bid)
		<p>{{ $item->bid }}</p>
	@else
		<p>Nog niets geboden</p>
	@endif







	@if(Auth::check())

	    <form id="register-form" method="POST" action="{{ route('AddBid', ['id' => $item->id]) }}" role="form" data-toggle="validator">
	        @csrf

	        <div class="form-group col-md-4">
	            <label class="label-control" for="cprice">Plaats bod</label>

	            <label class="label-control" for="">€</label>

	            <input type="price" class="form-control-input" id="cprice" name="price" min="1" @if($item->bids) value="{{ $item->bids->max('price') }}" @else value="1" @endif required>
	            <div class="help-block with-errors"></div>
	        </div>




	        <div class="form-group">
	            <button type="submit" class="form-control-submit-button">Plaats Bod</button>
	        </div>
	    </form>
	@else

		<p>Log in om een bod te plaatsen</p>

	@endif

	<p>{{ $item->description }}</p>
           





@stop