@extends('layout')

@section('title', 'Voorwerp toevoegen')


@section('content')

	<h1>Voorwerp toevoegen</h1>



    <form id="add-item-form" method="POST" action="{{ route('StoreItem') }}" role="form" data-toggle="validator" enctype="multipart/form-data">
        @csrf

        <div class="form-group col-md-6">
            <label class="label-control" for="ctitle">Titel</label>
            <input type="text" class="form-control" id="ctitle" name="title" value="{{ old('') }}" required>
        </div>


        <div class="form-group col-md-6">
            <label class="label-control" for="cdescription">Beschrijving</label>
        	<textarea type="text" rows="5" class="form-control" id="cdescription" name="description" value="{{ old('') }}" required></textarea>
        </div>


		<div class="form-group col-md-8">

			<div class="input-group control-group increment" >
				<input type="file" name="images[]" class="form-control">
				<div class="input-group-btn"> 
					<button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Afbeelding Toevoegen</button>
				</div>
			</div>

			<div class="clone hide">
				<div class="control-group input-group" style="margin-top:10px">
					<input type="file" name="images[]" class="form-control">
					<div class="input-group-btn"> 
						<button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Afbeelding Verwijderen</button>
					</div>
				</div>
			</div>
        </div>

		<button type="submit" class="btn btn-primary">Toevoegen</button>
    </form>







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