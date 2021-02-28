@extends('layout')




@section('content')

	<h1>Inloggen</h1>



    <form id="login-form" method="POST" action="{{ route('Login') }}" role="form" data-toggle="validator">
        @csrf

        <div class="form-group col-md-5">
            <label class="label-control" for="cemail">Email</label>
            <input type="email" class="form-control" id="cemail" name="email" required>
        </div>


        <div class="form-group col-md-5">
            <label class="label-control" for="cpassword">Wachtwoord</label>
            <input type="password" class="form-control" id="cpassword" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Inloggen</button>
    </form>


@stop