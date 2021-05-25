<template>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-9">
                <div class="row mt-4"  :class="{'loading': loading}">
 
                        <h4>Staffs</h4>

                        <button class="btn btn-info"> Create Staff User </button>
 
                        <table class="table table-striped" >
                                <tr>
                                    <td>ID </td>
                                    <td>Email </td> 
                                    <td>Name </td>
                                    <td>URL </td>
                                    <td>Status </td>

                                </tr>
                            <tr v-for="staff in staffs" v-bind:key="staff" >
                                <td>{{staffs.id}} </td>
                                <td>{{staffs.first_name}} </td>
                                <td>{{staffs.last_name}} </td>
                                <td>{{staffs.email}} </td>
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
                axios.get('/api/staffs')
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
