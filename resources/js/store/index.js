import Vue from 'vue';
import Vuex from 'vuex';
import userModule from './modules/users';
import blogModule from './modules/blog';


Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    blog: blogModule,
    users: userModule,
  },
});
