@extends('layout')




@section('content')

	<h1>Inloggen</h1>



        <form id="loginForm" method="POST" action="{{ route('login') }}" role="form" data-toggle="validator">
            @csrf

            




            <div class="form-group">
                <input type="email" class="form-control-input" id="cemail" name="email" required>
                <label class="label-control" for="cemail">Email</label>
                <div class="help-block with-errors"></div>
            </div>


            <div class="form-group">
                <input type="password" class="form-control-input" id="cpassword" name="password" required>
                <label class="label-control" for="cpassword">Wachtwoord</label>
                <div class="help-block with-errors"></div>
            </div>

                    


            <div class="form-group">
                <button type="submit" class="form-control-submit-button">INLOGGEN</button>
            </div>
            

        </form>


@stop