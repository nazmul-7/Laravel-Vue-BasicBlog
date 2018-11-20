<template>
<div>
    <div class="row justify-content-md-center" >
        <div v-if="errorMsg.length>0"  v-bind:class="(errorflag? 'alert alert-danger': 'alert alert-success')" class=" alert-dismissible fade show"  role="alert"><strong>{{(errorflag? 'Holy guacamole!': 'Aww yeah!')}}</strong>{{errorMsg}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>


        <div class="col-12 col-md-auto">

              <!-- Default form login -->
<form class="text-center border border-light p-5"  v-on:submit.prevent="Authentication">

    <p class="h4 mb-4">Sign in</p>
    <p class="h4 mb-4" v-if="users.length>0">{{users[0].name}}</p>

    <!-- Email -->
    <input type="text" v-model="username"  class="form-control mb-4" placeholder="User Name">

    <!-- Password -->
    <input type="password" v-model="password"  class="form-control mb-4" placeholder="Password">

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="">Forgot password?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit">Sign In</button>

    <!-- Register -->
    <p>Not a member?
        <a href="/signup"><router-link class="sure" :to="'signup'">Register</router-link></a>
    </p>

</form>
<!-- Default form login -->




            </div>
        </div>

    
    </div>
</template>
<script>
import {mapActions,mapGetters} from 'vuex';
	export default {
		data () {
			return {

                username:"",
                password:"",
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

        async Authentication(){

            var AuthData = {username:this.username,password:this.password};

             const info = await this.callApi('post', '/userAuthenticate',AuthData)
			if(info.status===200){
                this.errorMsg= this.username+" is logged in!!";
                console.log('Now we are pushing !');
                this.errorflag=false;
                this.$store.dispatch('users/updateLogINUser',info.data.UserData);
                this.$store.dispatch('users/updateFlag',true);
                
                this.$router.push('home');
                
            }
            else{
                    this.errorMsg=info.data.message ;
                    this.errorflag=true;
            }


        }

    },

    }
</script>

<style>
.sure{
        color: #fff;
}
</style>


