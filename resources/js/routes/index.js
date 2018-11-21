import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import home from '../pages/home.vue'
import SignIn from '../components/signin.vue'
import SignUp from '../components/signup.vue'
import Posts from '../pages/posts.vue'
import About from '../pages/about.vue'
import PostById from '../pages/postbyid.vue'
import Admin from '../admin/index.vue'
import EditPost from '../admin/edit_post.vue'

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/home',
      name: 'Home',
      component: home
    },
    {
      path: '/signin',
      name: 'SignIn',
      component: SignIn
    },
    {
      path: '/signup',
      name: 'SignUp',
      component: SignUp
    },
    {
      path: '/posts',
      name: 'Posts',
      component: Posts
    },
    {
      path: '/about',
      name: 'About',
      component: About
    },
    {
      path: '/postbyid/:id',
      name: 'PostById',
      component: PostById
    },
    {
      path: '/admin',
      name: 'Admin',
      component: Admin
    },
   
    {
      path: '/epost/:id',
      name: 'EditPost',
      component: EditPost
    },
   
  ]
})