<template>
<div>
  <section class="hero py-16">
    <div class="container mx-auto flex items-center justify-between">
        <div class="w-1/2">
            <h6 class="text-lg"><em>Are you hungry?</em></h6>
            <h1 class="text-3xl md:text-6xl font-bold">Don't wait !</h1>
            <button class="px-6 py-2 rounded-full text-white font-bold mt-4 btn-primary">Order Now</button>
        </div>
        <div class="w-1/2">
            <img src="/img/hero-pizza.png" alt="">
        </div>
    </div>
</section>

<section class="menu container mx-auto py-8">
    <h1 class="text-xl font-bold mb-8">All Pizzas</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 col-gap-12 row-gap-16">
           
            <div class="w-full md:w-64" v-for="(item, index) in items" :key="index">
                <img class="h-40 mb-4 mx-auto" :src="item.image" alt="">
                <div class="text-center">
                    <h2 class="mb-4 text-lg">{{item.name}}</h2>
                    <h3 class="mb-4 text-lg">SKU : {{item.sku}}</h3>
                    <span class="size py-1 px-4 rounded-full uppercase text-xs">{{item.category.name}}</span>
                    <div class="flex items-center justify-around mt-6">
                        <span class="font-bold text-lg">$ {{item.price}}</span>
                        <button data-pizza="" @click="addToCart(item)"
                                class="add-to-cart py-1 px-6 rounded-full flex items-center font-bold">
                            <span>+</span>
                            <span class="ml-4">Add</span>
                        </button>
                    </div>
                </div>
            </div>
        
    </div>
    </section>
   </div> 
</template>
<script>
import axios from "axios";
export default {
  name: "Home",
  props: ["user"],
  data() {
    return {

      items:{},
      error:null,
      showModal:false,
    };
  },
  created() {
  axios.get('all-product')
  .then((response) => {
    this.items=response.data.data;
  }, (error) => {
    console.log(error);
  });
  },
  methods: {
    addToCart(item) {
      console.log(item);
      //localStorage.removeItem('token');
      if (localStorage.getItem('product_cart') ==null) {
                let data = {
                    items: {},
                    totalQty: 0,
                    totalPrice: 0
                }
                data= JSON.stringify(data)
                localStorage.setItem('product_cart',data);
            }

            let cart =JSON.parse(localStorage.getItem('product_cart'));
            //console.log(cart.items)
            if(cart.items.[item.id] ==undefined) {
                cart.items[item.id] = {
                    item: item,
                    qty: 1
                };
                cart.totalQty = cart.totalQty + 1;
                cart.totalPrice = cart.totalPrice + parseFloat(item.price);
             } 
             else {
                cart.items.[item.id].qty = cart.items.[item.id].qty + 1;
                cart.totalQty = cart.totalQty + 1;
                cart.totalPrice =  cart.totalPrice + parseFloat(item.price);
            }
            document.getElementById('cartCounter').innerHTML =cart.totalQty;
            localStorage.setItem('totalQty',cart.totalQty);
            localStorage.setItem('product_cart',JSON.stringify(cart));
            //console.log(JSON.parse(localStorage.getItem('product_cart')));

    }
  }
};
</script>
