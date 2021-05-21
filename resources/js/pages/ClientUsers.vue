<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row mt-4"  :class="{'loading': loading}">
 
                        <h4>Client Users</h4>

                        <button class="btn btn-info"> Create Client User </button>
 
                        <table class="table table-striped" >
                                <tr>
                                    <td>ID </td>
                                    <td>Email </td> 
                                    <td>Name </td>
                                    <td>URL </td>
                                    <td>Status </td>

                                </tr>
                            <tr v-for="user in users" v-bind:key="user" >
                                <td>{{user.id}} </td>
                                <td>{{user.first_name}} </td>
                                <td>{{user.last_name}} </td>
                                <td>{{user.email}} </td>
                                <td> 
                                    <button class="btn btn-success"> Change Password </button>
                                    <button class="btn btn-danger"> Deactivate </button>
                                </td>
                            </tr>

                        </table>

                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        data: function () {
            return {
                users: [],                
                loading: true

             }
        },

        mounted() {
             this.loadAdminUsers();
        },

        methods: {
            loadAdminUsers: function () {
                axios.get('/api/users')
                    .then((response) => {
                        this.users = response.data.users;
                        this.loading = false;
                     })  
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>
