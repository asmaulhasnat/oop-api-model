<template>
  <div id="app">
   <Nav :user='user'/>
   <router-view :user='user'/>
  </div>
</template>

<script>
import Nav from './components/Nav.vue'
import axios from  'axios'
export default {
  name: 'App',
  components:{
  Nav,
  },
  data(){
    return {
      user:null, 
    }
  },
  created(){
    
    // const response = await axios.get('user');
    // console.log(response);
    // //this.$router.push('/');
    // this.user =response.data;
    
  },
  methods:{
    async handleClick(){
    const response = await axios.post('signout');
    console.log(response);
    localStorage.removeItem('token');
    this.$router.push('/login');
    }
  }

}
</script>

