<template>

<div class='row'>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Admin Users</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="/admin_users"> <router-link to ="/admin_users"> Admin Users </router-link> <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/clients"> <router-link to ="/clients"> Clients </router-link> </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/about"> <router-link to ="/about"> Staffs </router-link></a>
                    </li>
                </ul>
            </div>
        
            <a class='btn btn-danger' href="api/logout"> Logout </a>
        
        </div>

    </nav>

    <router-view />

</div>

</template>
