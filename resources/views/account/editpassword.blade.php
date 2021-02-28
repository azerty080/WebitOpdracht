@extends('layout')

@section('title', 'Wachtwoord veranderen')


@section('content')

	<h1>Wachtwoord veranderen</h1>


    <form id="change-password-form" method="POST" action="{{ route('UpdatePassword') }}" role="form" data-toggle="validator">
        @csrf

        <div class="form-group col-md-4">
            <label class="label-control" for="cold_password">Oud Wachtwoord</label>
            <input type="password" class="form-control" id="cold_password" name="old_password" required>
        </div>

        <div class="form-group col-md-4">
            <label class="label-control" for="cpassword">Nieuw Wachtwoord</label>
            <input type="password" class="form-control" id="cpassword" name="password" required>
        </div>
        
        <div class="form-group col-md-4">
            <label class="label-control" for="cpassword_confirmation">Bevestig Nieuw Wachtwoord</label>
            <input type="password" class="form-control" id="cpassword_confirmation" name="password_confirmation" required>
        </div>

		<button type="submit" class="btn btn-primary">Verander Wachtwoord</button>
    </form>

	

@stop