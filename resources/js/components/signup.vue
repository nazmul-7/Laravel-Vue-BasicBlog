<template>
<div>
    <div class="row justify-content-md-center">
        <div class="col-12 col-md-auto">

            <!-- Default form register -->
       
<form class="text-center border border-light p-5" v-on:submit.prevent="formSubmit">

    <p class="h4 mb-4">Sign up</p>

    
     <!-- name -->
    <input type="text" v-model="registration.name" class="form-control" placeholder="Name">
     <!-- Email -->
    <input type="text" v-model="registration.email" class="form-control" placeholder="Email">

    <!-- Password -->
    <input type="password" v-model="registration.password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">

    <!-- Confirm Password -->
    <input type="password" v-model="registration.password_confirmation"  class="form-control" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>

    

    

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit" >Sign in</button>

    
    <hr>

    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a> and
        <a href="" target="_blank">terms of service</a>. </p>

</form>
<!-- Default form register -->



            </div>
        </div>

    
    </div>
</template>
<script>
import {mapActions,mapGetters} from 'vuex';
	export default {
		data () {
			return {


                registration:{

                name:"",
                email:"",
                password:"",
                password_confirmation:"",
                },

                
                errorMsg:"",
                
                errorflag:true,
                
                
				
			}
		},
		computed: {
         ...mapGetters({
            users: 'users/users',

}),
        
    },
     
     methods: {

        async formSubmit(){

            console.log('Hi ! I am there');

            

            const info = await this.callApi('post', '/register',this.registration)
			if(info.status===200){
                //this.errorMsg= this.username+" is logged in!!";
              //  console.log('Now we are pushing !');
               // this.errorflag=false;

                this.$store.dispatch('users/updateLogINUser',this.registration);
                this.$store.dispatch('users/updateFlag',true);
                
                this.$router.push('home');
                
            }
            else{
                   // this.errorMsg=info.data.message ;
                  //  this.errorflag=true;
            }


        },

    },

    }
</script>

<style>
.sure{
        color: #fff;
}
</style>


