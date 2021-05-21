<template>
  <div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <form v-on:submit.prevent="Login">
              <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>

              <div class="form-group">
                <label for="email"> Email </label>
                <input type="email" v-model="data.username" class="form-control" name="email" placeholder="Email">
              </div>

              <div class="form-group">
                <label for="password"> Password</label>
                <input type="password" v-model="data.password" class="form-control" name="password" placeholder="Password">
              </div>

              <button class="btn btn-lg btn-primary btn-block" @click="login" :disabled="isLogging" :loading="isLogging">{{isLogging ? 'Loging...' : 'Login'}} Sign in</button>
            </form>
      </div>
    </div>
  </div>

</template>

<script>
export default {
    data(){
        return {
            data : {
                email : '', 
                password: ''
            }, 
            isLogging: false, 
        }
    }, 
 
    methods: {

        async login(){

            //if(this.data.email.trim()=='') return this.e('Email is required')

            //if(this.data.password.trim()=='') return this.e('Password is required')

            //if(this.data.password.length < 6) return this.e('Incorrect login details')

            this.isLogging = true


            const res = await this.callApi('post', 'api/admin_login', this.data)
            if(res.status === 200){
               
               this.s(res.data.msg)
                window.location = '/'
           
           }else{
               
                if(res.status===401){
                  
                  this.i(res.data.msg)
                
               
               }else if(res.status==422){
                
                    for(let i in res.data.errors){
                        
                        this.e(res.data.errors[i][0])
                
                    }
                }

                else{

                    this.swr()
                }
            }
            
            this.isLogging = false
      
      },
            handleLogin() {

            axios.get('/sanctum/csrf-cookie').then(response => {
            
                axios.post('/login', this.formData).then(response => {
                    console.log('User signed in!');
                }).catch(error => console.log(error)); // credentials didn't match
        
             });
      }


    }
    
    }
</script>