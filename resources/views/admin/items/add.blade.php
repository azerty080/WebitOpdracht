@extends('layout')

@section('title', 'Home')


@section('content')

	<h1>Add item</h1>




    <form id="register-form" method="POST" action="{{ route('StoreItem') }}" role="form" data-toggle="validator">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="label-control" for="cfirstname">Titel</label>
                <input type="text" class="form-control-input" id="cfirstname" name="firstname" value="{{ old('') }}" required>
                <div class="help-block with-errors"></div>
            </div>


            <div class="form-group col-md-5">
                <label class="label-control" for="clastname">Beschrijving</label>
                <input type="text" class="form-control-input" id="clastname" name="lastname" value="{{ old('') }}" required>
                <div class="help-block with-errors"></div>
            </div>


			<div class="form-group col-md-5">

                <label class="label-control" for="clastname">Afbeeldingen</label>
				<input type="file" name="images[]" multiple class="form-control" accept="image/*" required>

				@if ($errors->has('files'))
					@foreach ($errors->get('files') as $error)
						<span class="invalid-feedback" role="alert">
							<strong>{{ $error }}</strong>
						</span>
					@endforeach
				@endif


                <div class="help-block with-errors"></div>
            </div>

        </div>


        <div class="form-group">
            <button type="submit" class="form-control-submit-button">REGISTREER</button>
        </div>
    </form>





      <div class="form-group">
          
      </div>





@stop