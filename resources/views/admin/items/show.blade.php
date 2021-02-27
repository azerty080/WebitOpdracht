@extends('layout')

@section('title', 'Voorwerpen')


@section('content')

	<h1>Voorwerpen</h1>


	<ul>
		@foreach ($items as $item)
	        <li>
	            
	            <div class="url">
	                <h2>
	                	<a href="{{ '/admin/item/' . $item->id }}" class="urlTitle">{{ $item->id }} - {{ $item->title }}</a>
	                </h2>
	            </div> 


				
				<a href="{{ route('EditItem', ['id' => $item->id]) }}" class="btn btn-info">Bewerk Voorwerp</a>



				<form id="register-form" method="POST" action="{{ route('RemoveItem', ['id' => $item->id]) }}" role="form" data-toggle="validator">
			        @csrf

			        <div class="form-group">
			            <button type="submit" class="btn btn-danger remove-item">Verwijder Voorwerp</button>
			        </div>
			    </form>


	        </li>
	    @endforeach
	</ul>




@stop



@section('script')
	<script type="text/javascript">

	    $('.remove-item').click(function(e){
	        e.preventDefault() // Don't post the form, unless confirmed
	        if (confirm('Are you sure?')) {
	            // Post the form
	            $(e.target).closest('form').submit() // Post the surrounding form
	        }
	    });

	</script>
@stop