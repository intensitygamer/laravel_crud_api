<template>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Admin Users</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="#"> Admin Users <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Clients</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Staffs</a>
                </li>

                </li>
                
            </ul>
        </div>

         <a class='btn btn-danger' href="api/logout"> Logout </a>
    </div>
</nav>
    
    <router-view></router-view>


</template>
