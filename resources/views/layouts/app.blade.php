<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Sched Easy Client Manager </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    
         a.navbar-brand, .nav-item a {
            color: black !important;
        }

    </style>

</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Sched Easy') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                
                    <ul class="navbar-nav ml-auto">

                        @if (!Auth::guest())

                            @if (Auth::user()->user_type_id == 3)

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('staffs') }}">Staffs</a>
                                </li>
                                 
                            @endif  

                            @if (Auth::user()->user_type_id == 2)

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('clients') }}">Clients</a>
                                </li>
     
                            @endif  

                            @if(Auth::user()->user_type_id == 1)

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admins') }}">Admins</a>
                                </li>

                            @endif  

                            @if(Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2)

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('activity') }}"> Activity </a>
                                </li>

                            @endif
                        
                        @endif  

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
                    
                    </ul>

            </div>
        </nav>


        <main class="py-4">

        <div class='col col-12'>
            
            @if (!Auth::guest() && Auth::user()->user_type_id == 3) 
                 
                <h4> Client Info </h4>

                <table class = 'table table-striped'> 
                    
                    <tr><td>    Client Name: <td> {{ Auth::user()->get_client_details(Auth::id())->name}}
                    <tr><td>    CRM Url: <td> {{ Auth::user()->get_client_details(Auth::id())->crm_url}}
                    
                </table>

                <form action = "schedeasy.com/" method = 'POST'> 
                    
                    <button type= 'submit' class = 'btn btn-info'> Login through CRM </button>

                     @csrf
    
                </form>

            @endif  
            
        </div>

            @yield('content')

        </main>

    </div>

</body>

</html>
