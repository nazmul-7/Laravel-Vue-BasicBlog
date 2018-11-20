import {mapActions,mapGetters} from 'vuex';
export default  {
    data(){
        return {
           
          
                

        }
    },
    
   methods: {
  
    async callApi(method, url, dataObj){
        try{

            let data = await axios({
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                method: method,
                url: url,
                data: dataObj
            })
            return data 
            
        }catch(e){
            
            return e.response
        }
    },

    signOut(){
        console.log("I am Sign Out")
        var noinfo= [];
                this.$store.dispatch('users/updateLogINUser',noinfo);
                this.$store.dispatch('users/updateFlag',false);
    }

    
   },

   computed: {
    ...mapGetters({
       user: 'users/LogInUser',
       flag: 'users/getFlag',

}),
}

  
};