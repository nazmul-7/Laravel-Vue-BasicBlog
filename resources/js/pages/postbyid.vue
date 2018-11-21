<template>
	<div>
    <div class="row">
        <div class="col-md-12">
        <p class="quote">{{post['title']}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>{{ likes }} {{ (likes>1)? 'Likes' : 'Like' }} |<a v-on:click="like">Like</a></p>
            <p style="font-weight: bold">Tag: 
           <template v-for="(tag) in post['tags']" >
                     - {{ tag['name'] }} -
            </template>
        </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <p>{{post['content']}}</p>
        </div>
    </div>
		
	</div>
</template>
<script>
import {mapActions} from 'vuex';
import {mapGetters} from 'vuex';
	export default {
		data () {
			return {

                    post:'',
                    id:this.$route.params.id,
                    likes:"",
                
                
				
			}
		},
		computed: {
         ...mapGetters({

            //  likes: 'blog/likes',

}),
        
    },
     
     methods: {

         async like(){
              const info = await this.callApi('post', '/getLikePost',{'id':this.id});
        if(info.status===200){

                this.likes = info.data.Tlikes;   
                
            }
             
         }

       

    },

    async created(){

        this.$store.dispatch('blog/updateLikes',0);

        const info = await this.callApi('post', '/getPost',{'id':this.id});
        if(info.status===200){

                this.post = info.data.post;
                this.likes = info.data.Tlikes;   
               // this.$store.dispatch('blog/updateLikes',info.data.Tlikes);
                
                
                
            }

           
            

    }

    }
</script>


