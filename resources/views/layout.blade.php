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
        <!-- <script src="{{ asset('js/jquery-3.4.1.min.js')}}"></script> -->
        <!-- <script src="{{ asset('js/jquery-ui.min.js')}}"></script> -->

        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet"> -->
        <!-- <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet"> -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        

        

        <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">

            <a href="/">
                <h1>LOGO</h1>
            </a>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">


     

                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ route('index') }}">account ofwo zeke</a>
                        </li>
<!--
                        @if(session()->get('account_type') == 'klant')
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="">FAVORIETEN</a>
                            </li>
                        @endif
-->

                        <!-- Dropdown Menu -->
<!--
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">ACCOUNT</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href=""><span class="item-text">PROFIEL</span></a>
                                <div class="dropdown-items-divide-hr"></div>
                                <a class="dropdown-item" href=""><span class="item-text">UITLOGGEN</span></a>
                            </div>
                        </li>
-->
                        <!-- end of dropdown menu -->

                    @else
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ route('login') }}">INLOGGEN</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ route('register') }}">REGISTREREN</a>
                        </li>
                    @endif
                </ul>
            </div>


        </nav>
    


      

        <main>

             <div id="fadeout">
                <div class="messages">
                    @if(session()->has('message'))
                        <div class="message"><p>{{ session()->get('message') }}</p></div>
                    @endif
                    
                    @if(session()->has('error'))
                        <div class="error"><p>{{ session()->get('error') }}</p></div>
                    @endif

                    @if(count($errors) > 0)
                        <div class="error"><p>{{ $errors->first() }}</p></div>
                    @endif
                </div>
            </div>
          
            <div class="container">
                @yield('content')
            </div>

        </main>

        




        @yield('script')

        <script>
        	
        </script>
    </body>
</html>