<template>
	<div>

		<div class="topnav">
            <router-link class="active" :to="'/Home'">Home</router-link>
            <router-link  :to="'/posts'">Blogs</router-link>
            <router-link  :to="'/about'">About</router-link>
            <router-link class='activeName'  :to="'/admin'">{{this.user.name? this.user.name: 'Guest' }}</router-link>
            <router-link v-if="flag==false" class='Sign' :to="'/signin'">Sign In</router-link>
            <router-link v-if="flag==false" class='Sign' :to="'/signup'">Sign Up</router-link>
            <a v-if="flag" class='Sign'  v-on:click="signOut" >Log Out</a>
            
		</div>
	</div>
</template>

<script>
import {mapActions,mapGetters} from 'vuex';

	export default {
		data () {
			return {
              		
			}
		},
		computed: {
         ...mapGetters({

}),
        
    },

    mounted() {

    },
    methods: {
		
	}

    }
</script>
<style scoped>
/* Add a black background color to the top navigation */
.topnav {
    background-color: #333;
    overflow: hidden;
    margin-bottom: 10px;
}

/* Style the links inside the navigation bar */
.topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
    background-color: #4CAF50;
    color: white;
}
.topnav a.activeName {
    background-color: rgb(40, 174, 193);
    color: white;
    float: right;
}
.topnav .Sign {
    
    float: right;
    background-color: rgb(0, 101, 123);
    border-right: 2px solid rgb(51, 51, 51) ;
}
</style>

