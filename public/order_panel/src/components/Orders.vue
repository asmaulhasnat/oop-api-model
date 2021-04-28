<template>

 <section class="orders light-section">
    <div class="container mx-auto pt-12">
        <h1 class="font-bold text-lg mb-4">All orders</h1>
        <table class="w-full table-auto bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Orders Id </th>
                    <th class="px-4 py-2 text-left">Customer</th>
                    <th class="px-4 py-2 text-left">Address</th>
                    <th class="px-4 py-2 text-left">Phone</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Placed at</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
            	<tr  v-for="(item, index) in items" :key="index">
                    <td class="border px-4 py-2">
                        <router-link :to="{ path: '/view-status/'+ item.id}" class="link" >{{item.id}}</router-link>
                    </td>
                    <td class="border px-4 py-2">
                        <router-link :to="{ path: '/view-status/'+ item.id}" class="link" >{{item.user_id}}</router-link>
                    </td>
                    <td class="border px-4 py-2">
                    	<router-link :to="{ path: '/view-status/'+ item.id}" class="link" >{{item.address}}</router-link>
                        
                    </td>
                    <td class="border px-4 py-2">
                    	<router-link :to="{ path: '/view-status/'+ item.id}" class="link" >{{item.phone}}</router-link>
                        
                    </td>
                    <td class="border px-4 py-2">
                    	<router-link :to="{ path: '/view-status/'+ item.id}" class="link" >{{item.order_status}}</router-link>
                        
                    </td>
                    
                    <td class="border px-4 py-2">
                    	<router-link :to="{ path: '/view-status/'+ item.id}" class="link" >{{item.created_at}}</router-link>
                       
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</section>
</template>
<script>
import axios from "axios";
export default {
  name: "Order",
  data() {
    return {
      items:null,
      totalPrice:0,
      error:null,
      showModal:false,
      user:[],
      phone:'',
      address:'',
      validation:'',
    };
  },
  created() {
  	if (localStorage.getItem('user_info') !=null) {
  		this.user=JSON.parse(localStorage.getItem('user_info'));
  	}
  	if (localStorage.getItem('product_cart') !=null) {
  		let cart = JSON.parse(localStorage.getItem('product_cart'));
  		this.items = cart.items;
  		this.totalPrice=cart.totalPrice;
  	}

  	 let data={user_id:this.user.id,token:localStorage.getItem('user_token')};
      //console.log(data);
	axios.get('order',{ params: data })
    .then((response) => {
      this.items=response.data.data;

      	response.data.data.map()
    }, (error) => {
      console.log(error);
    });

  
  },
  methods: {
    orderNow() {

	 

    }
  }
};
</script>