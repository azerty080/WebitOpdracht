<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!--
        <link rel="icon" href="{{ asset('img/icon.ico') }}"/>
        -->

        <!-- Fonts -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- JS -->
        <script src="/js/jquery-3.5.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

<!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    -->

        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet"> -->
        <!-- <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet"> -->
        <link href="/css/style.css" rel="stylesheet">
    </head>
    <body>
        






        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">NVN Veiling</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">


                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>


                    @if(Auth::check())

                        @if(Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('AdminItems') }}">Bekijk voorwerpen</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('AdminAddItem') }}">Voorwerp toevoegen</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('Bids') }}">Mijn Biedingen</a>
                            </li>
                        @endif





                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->firstname }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                            <a class="dropdown-item" href="{{ route('EditPassword') }}">Verander Wachtwoord</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('Logout') }}">Uitloggen</a>


                            </div>
                        </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Login') }}">Inloggen</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Register') }}">Registreren</a>
                        </li>
                    @endif



                </ul>
            </div>
        </nav>


      

        <main class="container">

            <div class="messages">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
                @endif


                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
                @endif


                @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif


                @if ($message = Session::get('info'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif


                @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    {{$errors->first()}}
                </div>
                @endif
            </div>


          
            <div>
                @yield('content')
            </div>

        </main>

        




        @yield('script')
    </body>
</html>