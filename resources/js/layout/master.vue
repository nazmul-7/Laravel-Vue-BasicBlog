<template>
	<div >
		<NavHead/>
		<div class="container">
			<router-view></router-view>


		</div>
		
	</div>
</template>

<script>
import {mapActions,mapGetters} from 'vuex';
import NavHead from '../partials/navhead';
export default {
	components: {
    NavHead,
  },
	data(){
		return{

		}
	},
	async created() {

        const res = await this.callApi('get', '/app/get/some-data-from-laravel')
			if(res.status===200){

				 this.$store.dispatch('users/updateUser',res.data);

			}

       
	},
	computed: {

},
	
}
</script>
