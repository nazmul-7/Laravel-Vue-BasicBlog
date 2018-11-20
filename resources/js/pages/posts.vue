
<template>
	<div>
    <div class="row">
        <div class="col-md-12">
            <p class="quote">The beautiful Laravel</p>
        </div>
    </div>

<div class="row" v-for="(post,index) in posts" :key="index" >
    <div class="col-md-12 text-center">
        <h1 class="post-title">{{post['title']}}</h1>
        <p style="font-weight: bold">
           <template v-for="(tag) in post['tags']" >
                     - {{ tag['name'] }} -
            </template>
        </p>
        <p>{{post['content']}}</p>
        <p><router-link :to="{ name: 'PostById', params: { id: post['id'] }}">read more...</router-link></p>
        <hr>
    </div>

</div>


<!-- <div class="row">
    <div class="col-md-12 text-center">
        {{ $posts->links() }}
    </div>
</div> -->
	</div>
</template>

<script>
import {mapActions} from 'vuex';
import {mapGetters} from 'vuex';
	export default {
		data () {
			return {

                    posts:'',
                
                
				
			}
		},
		computed: {
         ...mapGetters({

}),
        
    },
     
     methods: {

       

    },

    async created(){

        const info = await this.callApi('post', '/getPosts');
        if(info.status===200){

                this.posts = info.data.posts;
                
                
            }
            

    }

    }
</script>


