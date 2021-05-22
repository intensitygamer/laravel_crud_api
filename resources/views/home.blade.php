<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loading.css') }}" rel="stylesheet"> -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Admin Users</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <router-link to ="/admin_users"> Admin Users </router-link> <span class="sr-only">(current)</span>  
                    </li>

                    <li class="nav-item">
                         <router-link to ="/clients"> Clients </router-link>  
                    </li>

                    <li class="nav-item">
                        <router-link to ="/about"> Staffs </router-link>    
                    </li>

             </ul>

        </div>

         <a class='btn btn-danger' href="api/logout"> Logout </a>
    </div>
</nav>

<div id="app">
    <router-view />
</div>

<footer class="footer py-5 bg-dark">
    <div class="container">
     </div>
</footer>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
