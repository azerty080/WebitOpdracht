@extends('layout')

@section('title', 'Registreren')

@section('content')

	<h1>Registreren</h1>



    <form id="register-form" method="POST" action="{{ route('RegisterSubmit') }}" role="form" data-toggle="validator">
        @csrf

        <div class="form-group col-md-5">
            <label class="label-control" for="cfirstname">Voornaam</label>
            <input type="text" class="form-control" id="cfirstname" name="firstname" value="{{ old('firstname') }}" required>
        </div>

        <div class="form-group col-md-5">
            <label class="label-control" for="clastname">Achternaam</label>
            <input type="text" class="form-control" id="clastname" name="lastname" value="{{ old('lastname') }}" required>
        </div>


        <div class="form-group col-md-5">
            <label class="label-control" for="caddress">Adres</label>
            <input type="text" class="form-control" id="caddress" name="address" value="{{ old('address') }}" required>
        </div>

        <div class="form-group col-md-5">
            <label class="label-control" for="ctownship">Gemeente</label>
            <input type="text" class="form-control" id="ctownship" name="township" value="{{ old('township') }}" required>
        </div>

        <div class="form-group col-md-5">
            <label class="label-control" for="cemail">Email</label>
            <input type="email" class="form-control" id="cemail" name="email" value="{{ old('email') }}" required>
        </div>
    
        <div class="form-group col-md-5">
            <label class="label-control" for="cpassword">Wachtwoord</label>
            <input type="password" class="form-control" id="cpassword" name="password" required>
        </div>
        
        <div class="form-group col-md-5">
            <label class="label-control" for="cpassword_confirmation">Bevestig wachtwoord</label>
            <input type="password" class="form-control" id="cpassword_confirmation" name="password_confirmation" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Registreren</button>
    </form>



@stop