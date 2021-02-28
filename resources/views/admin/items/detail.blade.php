@extends('layout')

@section('title', 'Detail Lot')


@section('content')


	<h1>Lot {{ $item->id }} - {{ $item->title }}</h1>



	<div id="carouselExampleIndicators" class="carousel slide w-75" data-ride="carousel">
		<div class="carousel-inner">
		@foreach ($item->images as $key => $image)
			<div class="carousel-item @if ($key == 0) active @endif">
				<img class="d-block" src="{{ $image->path }}" alt="Third slide">
			</div>
		@endforeach
		</div>

		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


	<h3 class="mt-3">Hoogste bod:
		@if (count($item->bids) == 0)
			Nog niets geboden
		@else
			€ {{ $item->bids->max('price') }}
		@endif
	</h3>


	<a href="{{ route('AdminItemBids', ['id' => $item->id]) }}" class="btn btn-primary">Bekijk alle biedingen</a>


	<h3 class="mt-3">Beschrijving</h3>
	<p>{{ $item->description }}</p>
           

	<div>
		<a href="{{ route('EditItem', ['id' => $item->id]) }}" class="btn btn-info d-inline-block">Bewerk Voorwerp</a>

		<form id="register-form" method="POST" action="{{ route('RemoveItem', ['id' => $item->id]) }}" role="form" data-toggle="validator" class="d-inline-block">
		    @csrf

		    <div class="form-group">
		        <button type="submit" class="btn btn-danger remove-item">Verwijder Voorwerp</button>
		    </div>
		</form>
	</div>


@stop



@section('script')
	<script type="text/javascript">

	    $('.remove-item').click(function(e){
	        e.preventDefault()
	        if (confirm('Ben je zeker dat je dit voorwerp wil verwijderen?')) {
	            $(e.target).closest('form').submit()
	        }
	    });

	</script>
@stop