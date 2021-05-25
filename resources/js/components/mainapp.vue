<template>

    <div class='row' >

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                
                    <a class="navbar-brand" href="#">Admin Users</a>
                
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item active">
                                <router-link to ="/admin_users" class="[nav-link]"> Admin Users </router-link> <span class="sr-only">(current)</span>
                            </li>

                            <li class="nav-item">
                                <router-link to ="/clientusers" class="[nav-link]"> Clients </router-link>
                            </li>

                            <li class="nav-item">
                                <router-link to ="/staffusers" class="[nav-link]"> Staffs </router-link>
                            </li>
                        </ul>
                        
                    </div>
                
                    <a class='btn btn-danger' href="api/logout"> Logout </a>
                
                </div>
                
            </nav>

            
    	<router-view/>

    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
a { 
    text-decoration: none;
    padding-left: 10px;
    color:white !important;
}
</style>