@extends('layout')

@section('title', 'Bewerk voorwerp')


@section('content')

	<h1>Bewerk voorwerp</h1>



    <form id="edit-item-form" class="mb-5" method="POST" action="{{ route('UpdateItem', ['id' => $item->id]) }}" role="form" data-toggle="validator" enctype="multipart/form-data">
        @csrf

        <div class="form-group col-md-6">
            <label class="label-control" for="ctitle">Titel</label>
            <input type="text" class="form-control" id="ctitle" name="title" value="{{ $item->title }}" required>
        </div>


		<div class="form-group col-md-6">
            <label class="label-control" for="cdescription">Beschrijving</label>
        	<textarea type="text" rows="5" class="form-control" id="cdescription" name="description" value="{{ old('') }}" required>{{ $item->description }}</textarea>
        </div>


		<div class="form-group col-md-8">


			<h4>Huidige Afbeeldingen</h4>

			<div class="control-group input-group" style="margin-top:10px">
				<input type="number" name="old_images_to_delete[]" value=0 class="form-control" hidden>
			</div>

			<div class="d-flex flex-wrap">
				@foreach ($item->images as $image)

					<div class="control-group mt-5 mr-5">
						<img src="{{ $image->path }}" height="200px">
						<input type="number" name="old_images_to_delete[]" value={{ $image->id }} class="form-control" hidden>
						<div class="input-group-btn"> 
							<button class="btn btn-danger btn-delete" type="button"><i class="glyphicon glyphicon-remove"></i> Delete</button>
						</div>
					</div>


				@endforeach
			</div>

			<div class="mt-5 mb-5">
				<h4 class="d-inline-block">Nieuwe Afbeeldingen Toevoegen</h4>
				<div class="input-group control-group increment d-inline-block w-auto">
					<div class="input-group-btn"> 
						<button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>+</button>
					</div>
				</div>
			</div>

			<div class="clone hide">
				<div class="control-group input-group" style="margin-top:10px">
					<input type="file" name="images[]" class="form-control">
					<div class="input-group-btn"> 
						<button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>Afbeelding Verwijderen</button>
					</div>
				</div>
			</div>


        </div>


		<button type="submit" class="btn btn-primary">Bewerking Opslaan</button>
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


			$(".btn-delete").click(function(){
				$(this).parents(".control-group").remove();
			});
	    });



	</script>
@stop