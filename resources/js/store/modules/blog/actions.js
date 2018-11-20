const updateLikes = async (context,data) => {
					  context.commit('LIKE_UPDATED', data);    
};



export default {
	updateLikes,
};
