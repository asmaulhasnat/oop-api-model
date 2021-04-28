<template>
 <section class="login flex justify-center pt-24">
    <div class="w-full max-w-xs">
        <form @submit.prevent="handleSubmit" id="loginform" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

            
                <span class="text-red-500 text-sm" v-if='error'>
                  <ul v-if='error' class="text-danger">
                  <li>{{validation}} </li>
                  <li v-for='(er,errorind) in error' v-bind:key='errorind'>{{errorind}} : {{er[0]}}</li>
                </ul>
                </span>
           

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Email
                </label>
                <input v-model="email" name="email" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="email" placeholder="Enter your email">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input name="password" v-model="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="password" placeholder="******************">
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="btn-primary rounded-full text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Log In
                </button>
                <router-link to='/register' class="inline-block align-baseline font-bold text-sm" href="/register">
                    Don't have account?
                </router-link>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2021 as All rights reserved.
        </p>
    </div>
</section>
</template>
<script>
import axios from  'axios'
export default{
	name:'Login',
	data(){
		return {
			password:'',
			email:'',
      error:null,
      validation:'',
		}
	},
	methods:{
		handleSubmit(){
      let data={email:this.email,password:this.password};
      //console.log(data);
		axios.get('signin',{ params: data })
    .then((response) => {
      if (response.data.status==422) {
        this.validation =response.data.message;
        this.error=response.data.data;
       }else{
        this.error='';
        console.log(response.data.data);
        localStorage.setItem('user_token',response.data.data.access_token);
        localStorage.setItem('user_id',response.data.data.user.id);
        localStorage.setItem('user_type',response.data.data.user.user_type);
        localStorage.setItem('user_info',JSON.stringify(response.data.data.user));
        if (response.data.data.user.user_type =='user') {
          location.href='/';
        }else{
            location.href='/admin';
        }
        
        //this.$router.push('/');
       }

    }, (error) => {
      console.log(error);
    });

   		
		}
	}
}
</script>


