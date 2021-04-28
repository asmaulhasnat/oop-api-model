<template>
 <div class="container">   
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <!-- Sign Up form -->
        <form action="" @submit.prevent="handleSubmit" class="Signup">
          <h3>Sign Up Now!!!</h3>
          <ul v-if='error' class="bg-danger">
            <li v-for='(er,errorind) in error' v-bind:key='errorind'>{{er[0]}}</li>
          </ul>
          <div class="form-group">
              <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Name" v-model='name'>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
            <input type="text" class="form-control" placeholder="Enter Email" v-model='email'>
          </div>      
          <div class="form-group">
              <label for="psw">Password</label>
            <input type="password" class="form-control" placeholder="Enter Password"  v-model='password'> 
          </div>   
          <div class="form-group">
            <label for="psw-repeat">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Repeat Password"  v-model='password_confirmation'>
          </div>
          
          <button type="submit" class="btn btn-success">Signup</button>
          <div class="form-group">
            <p class="not-yet">Already have an account? <a href="/login">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import axios from  'axios'
export default{
	name:'Register',
	data(){
		return {
			name:'',
			email:'',
			password:'',
			password_confirmation:'',
      error:null,
		}
	},
	methods:{
		async handleSubmit(){
		const response = await axios.post('signup',{
			name:this.name,email:this.email,password:this.password,password_confirmation:this.password_confirmation
		});
		console.log(response);
    if (response.data.error) {
    this.error=response.data.error;
   }else{
    alert(response.data.message);
    this.$router.push('/login');
    //this.$router.push('/');
   }
		
		}
	}
}
</script>

