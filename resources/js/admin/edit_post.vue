<template>
	<div>
       <div class="row" >
        <div class="col-md-12">
            <form v-on:submit.prevent="EditPost">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text"  v-model="title"    class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control"  v-model="content" id="content" name="content">
                </div>
                
                    <div class="checkbox" v-for="(tag,index) in tags" :key='index'>
                        <label>
                            <input type="checkbox"  v-bind:value="tag['id']" v-model="checkedTags" v-text="(Object.values(post['tags']).indexOf(tag['id']) > -1) ? 'checked' : '' " > {{ tag['name'] }}
                        </label>
                    </div>
                
                <!-- {{ csrf_field() }} -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
       
    </div>
	</div>
</template>

<script>
import {mapActions,mapGetters} from 'vuex';
	export default {
		data () {
			return {

                    post:'',
                    postfield:true,
                    title:"",
                    content:"",
                    tags:'',
                    checkedTags:[],
                    msg:'',
                    errors:[],
                    id:this.$route.params.id,
				
			}
		},
		computed: {
         ...mapGetters({

}),
        
    },
     
     methods: {

         ChangePostField(){

             this.postfield = false;
             this.msg='';
             this.title ='';
             this.content ='';
         },
          async EditPost(){

            var AuthPost = {title:this.title,content:this.content,tags:this.checkedTags};

             const info = await this.callApi('post', '/create',{'id':this.id});
			if(info.status===200){
                
                 this.postfield = false;
                 this.msg = info.data.message;
                 this.posts = info.data.posts;
                
            } else if (info.status===422){
                this.msg=info.data.message;
                this.errors = info.data.errors;

            }
        },       

    },

    async created(){

        const info = await this.callApi('post', '/getPost',{'id':this.id});
        if(info.status===200){

                this.post = info.data.post;
                this.title = info.data.post['title'];
                this.content = info.data.post['content'];
                this.tags = info.data.tags;

                console.log('Tags: '+info.data.post.tags)
                
                
                for (var tag in info.data.post.tags) {
                    console.log('id: '+tag['id'])
                this.checkedTags.push(tag['id']);
                }
                
            }
            

    }

    }
</script>


