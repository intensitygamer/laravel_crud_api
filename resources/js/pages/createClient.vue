<template>
    <div class="container" style="margin-top: 50px;">
        <div class="container-fluid">
            <h2>Create Client</h2>
           
            <div class="row">


                <div class="form-control">

                    <Input type="text" v-model="data.email" placeholder="Email" />
                    
                </div>

                <div class="form-control">

                    <Input type="password" v-model="data.password" placeholder="Password" />
                    
                </div>

                <div class="form-control">
    
                    <Input type="text" v-model="data.first_name" placeholder="First Name" />

                </div>

                <div class="form-control">
    
                    <Input type="text" v-model="data.last_name" placeholder="Last Name" />

                </div>


                <div class="form-control">
    
                    <Input type="text" v-model="data.address" placeholder="Address" />

                </div>

                <div class="form-control">
    
                    <Input type="text" v-model="data.street" placeholder="Street" />

                </div>

                <div class="form-control">
    
                    <Input type="text" v-model="data.house_no" placeholder="House No" />

                </div>

                <div class="form-control">
    
                    <Input type="text" v-model="data.city" placeholder="City" />

                </div>

                <div class="form-control">
    
                    <Input type="text" v-model="data.territory" placeholder="Territory" />

                </div>

                <div class="form-control">
    
                    <Input type="text" v-model="data.postal_code" placeholder="Postal Code" />

                </div>


                <div class="form-control">
    
                    <Input type="text" v-model="data.country" placeholder="Country" />

                </div>

                
                <div class="form-control">
                    <Button @click="save" :disabled="isCreating" class="btn btn-primary">Save</Button>
                </div>
            
            </div>

        </div>
    </div>
</template>


<script>

export default {

	data(){

	    return {
            config: {

			},
            data: {
				user_type_id : 3,
				first_name : '',
				last_name : '',
				email  : '',
				username  : '',
				password : '',
				jsonData: null

			},
            initData: null,
			isCreating: false,

        }
    },

 	methods : {
    

        async onSave(response){
           
            var data = response
            this.data.jsonData = JSON.stringify(data)
 
            if(this.data.user_type_id.trim()=='') return this.e('User Type is required')
            if(this.data.first_name.trim()=='') return this.e('First Name is required')
            if(this.data.last_name.trim()=='') return this.e('Last Name is required')
            if(this.data.email.trim()=='') return this.e('Email is required')
            if(this.data.password.trim()=='') return this.e('Password is required')
            if(this.data.password.trim()=='') return this.e('Password is required')
            if(this.data.password.trim()=='') return this.e('Password is required')

			this.isCreating = true

			const res = await this.callApi('post', 'api/client', this.data)

			if(res.status===200){
				this.s('Client has been created successfully!')
                // redirect...
                this.$router.push('/clients')

			}else{
                 
                if(res.status==422){

                    for(let i in res.data.errors){
                        this.e(res.data.errors[i][0])
                    }

                }else{
                    this.swr()
                }

			}

			this.isCreating = false


        },
        async save(){
            //this.$refs.editor.save()
        },

		outputHtml(articleObj){

         }
    }

}
</script>