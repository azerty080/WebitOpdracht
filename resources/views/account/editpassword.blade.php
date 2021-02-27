@extends('layout')

@section('title', 'Wachtwoord veranderen')


@section('content')

	<h1>Wachtwoord veranderen</h1>


	


    <form id="register-form" method="POST" action="{{ route('UpdatePassword') }}" role="form" data-toggle="validator">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="password" class="form-control-input" id="cold_password" name="old_password" required>
                <label class="label-control" for="cold_password">Oud Wachtwoord</label>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="password" class="form-control-input" id="cpassword" name="password" required>
                <label class="label-control" for="cpassword">Nieuw Wachtwoord</label>
                <div class="help-block with-errors"></div>
            </div>
            
            <div class="form-group col-md-6">
                <input type="password" class="form-control-input" id="cpassword_confirmation" name="password_confirmation" required>
                <label class="label-control" for="cpassword_confirmation">Bevestig Nieuw Wachtwoord</label>
                <div class="help-block with-errors"></div>
            </div>
        </div>


        <div class="form-group">
            <button type="submit" class="form-control-submit-button">Verander Wachtwoord</button>
        </div>
    </form>

	

@stop