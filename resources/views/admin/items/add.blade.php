@extends('layout')

@section('title', 'Home')


@section('content')

	<h1>Add item</h1>




    <form id="register-form" method="POST" action="{{ route('StoreItem') }}" role="form" data-toggle="validator" enctype="multipart/form-data">
        @csrf

            <div class="form-group col-md-4">
                <label class="label-control" for="ctitle">Titel</label>
                <input type="text" class="form-control-input" id="ctitle" name="title" value="{{ old('') }}" required>
                <div class="help-block with-errors"></div>
            </div>


            <div class="form-group col-md-5">
                <label class="label-control" for="cdescription">Beschrijving</label>
                <input type="text" class="form-control-input" id="cdescription" name="description" value="{{ old('') }}" required>
                <div class="help-block with-errors"></div>
            </div>


			<div class="form-group col-md-5">


				@if ($errors->has('files'))
					@foreach ($errors->get('files') as $error)
						<span class="invalid-feedback" role="alert">
							<strong>{{ $error }}</strong>
						</span>
					@endforeach
				@endif


		        <div class="input-group control-group increment" >
		          <input type="file" name="images[]" class="form-control">
		          <div class="input-group-btn"> 
		            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
		          </div>
		        </div>
		        <div class="clone hide">
		          <div class="control-group input-group" style="margin-top:10px">
		            <input type="file" name="images[]" class="form-control">
		            <div class="input-group-btn"> 
		              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
		            </div>
		          </div>
		        </div>


                <div class="help-block with-errors"></div>
            </div>



        <div class="form-group">
            <button type="submit" class="form-control-submit-button">Toevoegen</button>
        </div>
    </form>





      <div class="form-group">
          
      </div>





@stop




@section('script')
	<script type="text/javascript">


	    $(document).ready(function() {

	      $(".btn-success").click(function(){ 
	          var html = $(".clone").html();
	          $(".increment").after(html);
	      });

	      $("body").on("click",".btn-danger",function(){ 
	          $(this).parents(".control-group").remove();
	      });

	    });

	</script>
@stop