const USER_UPDATED = (state,user) => {   
            state.users=user;
          };
const Log_IN_USER_UPDATED = (state,user) => {  
            console.log("Log In user Upadating") ;
            state.user=user;
          };
const Flag_UPDATED = (state,data) => {  
            console.log("Flag  Upadating") ;
            state.flag=data;
          };



export default {
            USER_UPDATED,
            Log_IN_USER_UPDATED,
            Flag_UPDATED,
};
