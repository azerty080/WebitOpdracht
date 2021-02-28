@extends('layout')

@section('title', 'Voorwerpen')


@section('content')

	<h1>Voorwerpen</h1>

	<ul class="list-group">
		@foreach ($items as $item)
	        <li class="list-group-item">
	            
	            <div class="d-flex justify-content-between">
	                <h2 class="">
	                	<a href="{{ '/admin/item/' . $item->id }}" class="urlTitle">Lot {{ $item->id }} - {{ $item->title }}</a>
	                </h2>

					<div class="">
						<a href="{{ route('EditItem', ['id' => $item->id]) }}" class="btn btn-info d-inline-block">Bewerk Voorwerp</a>

						<form id="register-form" class="d-inline-block" method="POST" action="{{ route('RemoveItem', ['id' => $item->id]) }}" role="form" data-toggle="validator">
					        @csrf

					        <div class="form-group">
					            <button type="submit" class="btn btn-danger remove-item">Verwijder Voorwerp</button>
					        </div>
					    </form>
				    </div>

				</div>

	        </li>
	    @endforeach
	</ul>


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