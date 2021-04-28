<template>
 <nav class="container mx-auto flex items-center justify-between py-4">
    <div>
        <a href="/"><img src="/img/logo.png" alt="logo"></a>
    </div>
    <div>
        <ul class="flex items-center">
            <li class="ml-6"><a href="/">Menu</a></li>
           
                <li class="ml-6">
                    <form id="logout" action="/logout" method="POST">
                        <a onclick="document.getElementById('logout').submit()" href="#">Logout</a>
                    </form>
                </li>
            
                <li class="ml-6"><router-link to='/register'>Register</router-link></li>
                <li class="ml-6"><router-link to='/login'>Login</router-link></li>
           
            <li class="ml-6">
              <router-link to='/cart' class="inline-block px-4 py-2 rounded-full flex items-center"><span id="cartCounter"
                              class="text-white font-bold pr-2"></span><img src="/img/cart.png" alt="">
                </router-link>
            </li>
        </ul>
    </div>
</nav>
</template>
<script>
export default{
	name:'Nav',
	props:['user'],
	methods:{
    async handleClick(){
    localStorage.removeItem('token');
    location.href='/login';
    this.$router.push('/login');
    }
  }
}
</script>