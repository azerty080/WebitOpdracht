@extends('layout')

@section('title', 'Detail')


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


	<a href="{{ route('ItemBids', ['id' => $item->id]) }}" class="btn btn-primary">Bekijk alle biedingen</a>


	@if(Auth::check())

		@if ($item->bids->where('user_id', Auth::id())->first())
			<div>
				<h3 class="mt-5 d-inline-block">Uw hoogste bod: € {{ $item->bids->where('user_id', Auth::id())->max('price') }}</h3>

			    <form id="delete-bid-form" class="d-inline-block" method="POST" action="{{ route('RemoveBid', ['id' => $item->id]) }}" role="form" data-toggle="validator">
			        @csrf

					<button type="submit" class="btn btn-danger remove-bid">Verwijder Bod</button>
			    </form>
		    </div>
		@endif


	    <form id="add-bid-form" class="mt-5 d-flex .flex-sm-row h-auto" method="POST" action="{{ route('AddBid', ['id' => $item->id]) }}" role="form" data-toggle="validator">
	        @csrf

	        <div class="form-group col-md-4 mb-0 d-flex .flex-sm-row pl-0">
	            <h3 class="m-0"><label class="label-control m-0" for="cprice">Bieden</label></h3>


	            <div class="input-group ml-3">
					<div class="input-group-prepend">
						<span class="input-group-text">€</span>
					</div>

					<div class="input-group-append">
			            <input type="price" class="form-control currency" id="cprice" name="price" min="1" @if($item->bids) value="{{ $item->bids->max('price')+1 }}" min="{{ $item->bids->max('price')+1 }}" @else value="1" min="1" @endif required>
		            </div>
	            </div>

	        </div>

			<button type="submit" class="btn btn-primary">Plaats Bod</button>

	    </form>
	@else

		<h3>Log in om een bod te plaatsen</h3>

	@endif

	<h3 class="mt-5">Beschrijving</h3>
	<p class="mb-5">{{ $item->description }}</p>

@stop





@section('script')
	<script type="text/javascript">

	    $('.remove-bid').click(function(e){
	        e.preventDefault()
	        if (confirm('Ben je zeker dat je dit bod wil verwijderen?')) {
	            $(e.target).closest('form').submit()
	        }
	    });

	</script>
@stop