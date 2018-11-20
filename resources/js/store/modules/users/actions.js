const updateUser = async (context,data) => {
					  context.commit('USER_UPDATED', data);    
};
const updateLogINUser = async (context,data) => {
					  context.commit('Log_IN_USER_UPDATED', data);    
};
const updateFlag = async (context,data) => {
					  context.commit('Flag_UPDATED', data);    
};


export default {
	updateUser,
	updateLogINUser,
	updateFlag,
};
