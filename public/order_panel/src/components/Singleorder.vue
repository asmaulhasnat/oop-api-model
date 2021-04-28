<template>
<section class="status">
    <div class="container mx-auto">
        <div class="status-box w-full lg:w-2/3 mx-auto">
            <div class="flex items-center justify-between mb-12">
                <h1 class="text-xl font-bold">Track delivery status</h1>
                <h6 class="bg-white py-1 rounded-full px-4 text-green-600 text-xs"></h6>
                <input id="hiddenInput" type="hidden" value="order_placed">
            </div>
            <ul>
                <li class="status_line text-sm md:text-xl pb-16 " v-bind:class="{ Processing}"  data-status="order_placed"><span>Processing</span>
                </li>
                <li class="status_line text-sm md:text-xl pb-16" v-bind:class="{ Confirm}" data-status="confirmed"><span>Confirm</span>
                </li>
                <li class="status_line text-sm md:text-xl pb-16" data-status="prepared"><span>Shipped</span></li>
                <li class="status_line text-sm md:text-xl pb-16" data-status="delivered"><span>Delivered </span>
                </li>
                <li class="status_line text-sm md:text-xl" data-status="completed"><span>Complete</span></li>
            </ul>
        </div>
    </div>
</section>
</template>
<script>
import axios from "axios";
export default {
  name: "Singleorder",
  data() {
    return {
      Processing:false,
      Confirm:false,
      Shipped:false,
      Delivered:false,
      Complete:false,
      user:[],
    };
  },
  async created() {
  	if (localStorage.getItem('user_info') !=null) {
  		this.user=JSON.parse(localStorage.getItem('user_info'));
  	}
   	 let data={user_id:this.user.id,id:this.$route.params.id,token:localStorage.getItem('user_token')};
   	const res = await axios.get('order/check', { params: data });
   	 console.log(res);
  
  },
  methods: {
    orderNow() {

	 

    }
  }
};
</script>