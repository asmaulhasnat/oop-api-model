import Vue from 'vue'
import Router from 'vue-router'

import Home from './components/Home.vue'
import Login from './components/Login.vue'
import Register from './components/Register.vue'
import Cart from './components/Cart.vue'
import Orders from './components/Orders.vue'
import Singleorder from './components/Singleorder.vue'

Vue.use(Router)
export default new Router({
	mode:'history',
	routes:[
	{path: '/',component: Home},
	{path: '/login',component: Login},
	{path: '/register',component: Register},
	{path: '/cart',component: Cart},
	{path: '/orders',component: Orders},
	{path: '/view-status/:id',component: Singleorder},
	]
})

