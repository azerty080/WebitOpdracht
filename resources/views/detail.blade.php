@extends('layout')

@section('title', 'Detail')


@section('content')

	<h1>Detail Item</h1>





	<h1>Lot {{ $item->id }} - {{ $item->title }}</h1>


	@foreach ($item->images as $image)

		<img src="{{ $image->path }}" width="200px">

	@endforeach


	<h3>Hoogste bod</h3>
	@if (count($item->bids) == 0)
		<p>Nog niets geboden</p>
	@else
		<p>€ {{ $item->bids->max('price') }}</p>
	@endif
	




	@if(Auth::check())

		@if ($item->bids->where('user_id', Auth::id())->first())
			<h3>Uw hoogste bod</h3>
			<p>€ {{ $item->bids->where('user_id', Auth::id())->max('price') }}</p>

		    <form id="register-form" method="POST" action="{{ route('RemoveBid', ['id' => $item->id]) }}" role="form" data-toggle="validator">
		        @csrf

		        <div class="form-group">
		            <button type="submit" class="btn btn-danger remove-bid">Verwijder Bod</button>
		        </div>
		    </form>
		@endif






	    <form id="register-form" method="POST" action="{{ route('AddBid', ['id' => $item->id]) }}" role="form" data-toggle="validator">
	        @csrf

	        <div class="form-group col-md-4">
	            <label class="label-control" for="cprice">Plaats bod</label>

	            <label class="label-control" for="">€</label>

	            <input type="price" class="form-control-input" id="cprice" name="price" min="1" @if($item->bids) value="{{ $item->bids->max('price')+1 }}" min="{{ $item->bids->max('price')+1 }}" @else value="1" min="1" @endif required>
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





@section('script')
	<script type="text/javascript">

	    $('.remove-bid').click(function(e){
	        e.preventDefault() // Don't post the form, unless confirmed
	        if (confirm('Are you sure?')) {
	            // Post the form
	            $(e.target).closest('form').submit() // Post the surrounding form
	        }
	    });

	</script>
@stop