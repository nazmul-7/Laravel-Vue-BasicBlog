<template>
	<div>



    <div class="row" v-if="!postfield">
        <div class="col-md-12">
            <a  class="btn btn-success" v-on:click='ChangePostField'>New Post</a>
        </div>
       
    </div>
      <hr>
    
    <div class="row" v-if="postfield">
        <div class="col-md-12">
            <form v-on:submit.prevent="CreatePost">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text"   v-model="title" class="form-control" v-bind:class=" (errors.title) ? ' is-invalid' : '' " id="title" name="title">
                    <span v-if="errors.title" class="invalid-feedback" role="alert">
                        <strong v-for="(error,index) in errors.title" :key="index">{{ error}}</strong>
                    </span>
                               
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" v-bind:class=" (errors.content) ? ' is-invalid' : '' " v-model="content" id="content" name="content">
                     <span v-if="errors.content" class="invalid-feedback" role="alert">
                        <strong v-for="(error,index) in errors.content" :key="index">{{ error}}</strong>
                    </span>
                </div>
                
                    <div class="checkbox" v-for="(tag,index) in tags" :key='index'>
                        <label>
                            <input type="checkbox"  v-bind:value="tag['id']" v-model="checkedTags"> {{ tag['name'] }}
                        </label>
                    </div>
                
                <!-- {{ csrf_field() }} -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
       
    </div>
     <hr>


    <div class="row" v-for="(post,index) in posts" :key="index" >
        <div class="col-md-12">
            <p><strong>{{ post['title'] }}</strong>
                <!-- @if (Gate::allows('manipulate-post', $post))
                <a href="{{ route('admin.edit', ['id' => $post->id]) }}">Edit</a>
                <a href="{{ route('admin.delete', ['id' => $post->id]) }}"  style="color: red;">Delete</a>
                @endif -->
                 <template><router-link   :to="{ name: 'EditPost', params: { id: post['id'] }}">Edit</router-link></template>
                 <a v-on:click='getAdminDelete(post["id"])'  style="color: red;">Delete</a>
                 <!-- <router-link  :to="'cpost'">New Post</router-link> -->
                
            </p>
        </div>
    </div>
        

		
	</div>
</template>

<script>
import {mapActions,mapGetters} from 'vuex';
	export default {
		data () {
			return {

                    posts:'',
                    postfield:false,
                    title:"",
                    content:"",
                    tags:'',
                    checkedTags:[],
                    msg:'',
                    errors:[],
				
			}
		},
		computed: {
         ...mapGetters({

}),
        
    },
     
     methods: {

         ChangePostField(){

             this.postfield = true;
             this.msg='';
             this.title ='';
             this.content ='';
         },
          async CreatePost(){

            var AuthPost = {title:this.title,content:this.content,tags:this.checkedTags};

             const info = await this.callApi('post', '/create',AuthPost)
			if(info.status===200){
                
                 this.postfield = false;
                 this.msg = info.data.message;
                 this.posts = info.data.posts;
                
            } else if (info.status===422){
                this.msg=info.data.message;
                this.errors = info.data.errors;

            }
        },    
          async getAdminDelete(id){

              console.log('Index Id : '+id);

            const info = await this.callApi('post', '/getAdminDelete',{id:id});
			if(info.status===200){
                
                 this.msg = info.data.message;
                 this.posts = info.data.posts;
                
            } else{
                this.msg=info.data.message;
               
            }

        }    

    },

    async created(){

        const info = await this.callApi('post', '/getPosts');
        if(info.status===200){

                this.posts = info.data.posts;
                this.tags = info.data.tags;
                
            }
            

    }

    }
</script>


