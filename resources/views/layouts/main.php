<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
<style>
.title{
    text-align:center;
}
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: center;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
</head>
<body>

<h2 class='title'>Api Documentation</h2>

<button class="accordion"><i class="fa fa-unlock fa-2x" aria-hidden="true"></i> Sign UP</button>
<div class="panel">
  <p> URL : /signup</p>
  <p> METHOD : POST</p>
  <p> PARAM : </p>
  
  <ul>
        <li>name</li>
        <li>email</li>
        <li>password</li>
        <li>password_confirmation</li>
    </ul>

</div>


<button class="accordion"><i class="fa fa-unlock fa-2x" aria-hidden="true"></i> Sign IN</button>
<div class="panel">
  <p> URL : /signin</p>
  <p> METHOD : POST</p>
  <p> PARAM : </p>
  
  <ul>
        <li>email (for admin ahsweet92@gmail.com)</li>
        <li>password (for admin 12345678)</li>
    </ul>

</div>
<button class="accordion"><i class="fa fa-lock fa-2x" aria-hidden="true"></i> User Profile</button>

  <div class="panel">
  <p> URL : /profile</p>
  <p> METHOD : POST /GET</p>
  <p> PARAM :</p>
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
    </ul>

</div>

<button class="accordion"><i class="fa fa-lock fa-2x" aria-hidden="true"></i> View Product Category (Admin)</button>

  <div class="panel">
  <p> URL : /category</p>
  <p> METHOD : POST /GET</p>
  <p> PARAM :</p>
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
    </ul>

</div>
<button class="accordion"><i class="fa fa-lock fa-2x" aria-hidden="true"></i> Add Product Category (Admin)</button>

  <div class="panel">
  <p> URL : /category/crete</p>
  <p> METHOD : POST</p>
  <p> PARAM :</p>
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
        <li>name </li>
    </ul>

</div>

<button class="accordion"><i class="fa fa-lock fa-2x" aria-hidden="true"></i> Edit Product Category  (Admin)</button>

  <div class="panel">
  <p> URL : /category/edit</p>
  <p> METHOD : POST</p>
  <p> PARAM :</p>
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
        <li>id </li>
    </ul>

</div>

<button class="accordion"><i class="fa fa-lock fa-2x" aria-hidden="true"></i> Update  Product Category (Admin)</button>

  <div class="panel">
  <p> URL : /product/crete</p>
  <p> METHOD : POST</p>
  <p> PARAM :</p>
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
        <li>id </li>
        <li>name </li>
        <li>category_id (int) </li>
        <li>sku </li>
        <li>price(double) </li>
        <li>description </li>
        <li>image </li>
    </ul>

</div>

<button class="accordion"><i class="fa fa-unlock fa-2x" aria-hidden="true"></i> View Product </button>

  <div class="panel">
  <p> URL : /all-product</p>
  <p> METHOD : POST /GET</p>
  <p> PARAM :(none)</p>

</div>

<button class="accordion"><i class="fa fa-lock fa-2x" aria-hidden="true"></i> View Product (Admin)</button>

  <div class="panel">
  <p> URL : /product</p>
  <p> METHOD : POST /GET</p>
  <p> PARAM :</p>
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
    </ul>

</div>
<button class="accordion"><i class="fa fa-lock fa-2x" aria-hidden="true"></i> Add Product (Admin)</button>

  <div class="panel">
  <p> URL : /product/crete</p>
  <p> METHOD : POST</p>
  <p> PARAM :</p>
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
        <li>name </li>
        <li>category_id (int) </li>
        <li>sku </li>
        <li>price(double) </li>
        <li>description </li>
        <li>image </li>
    </ul>

</div>



<button class="accordion"><i class="fa fa-lock fa-2x" aria-hidden="true"></i> Edit Product (Admin)</button>

  <div class="panel">
  <p> URL : /product/edit</p>
  <p> METHOD : POST</p>
  <p> PARAM :</p>
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
        <li>id </li>
    </ul>

</div>

<button class="accordion"><i class="fa fa-lock fa-2x" aria-hidden="true"></i> Update  Product (Admin)</button>

  <div class="panel">
  <p> URL : /product/update</p>
  <p> METHOD : POST</p>
  <p> PARAM :</p>
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
        <li>id </li>
        <li>name </li>
        <li>category_id (int) </li>
        <li>sku </li>
        <li>price(double) </li>
        <li>description </li>
        <li>image </li>
    </ul>

</div>

<button class="accordion"><i class="fa fa-lock fa-2x"></i>  Order Status (For Customer)   </button>

  <div class="panel">
  <p> URL : /order/check</p>
  <p> METHOD : POST</p>
  <p> PARAM : </p>
  
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
        <li>id (order_id) </li>
    </ul>


</div>

<button class="accordion"><i class="fa fa-lock fa-2x"></i> View Order (For Customer)  </button>

  <div class="panel">
  <p> URL : /order</p>
  <p> METHOD : POST</p>
  <p> PARAM : </p>
  
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
    </ul>


</div>

<button class="accordion"><i class="fa fa-lock fa-2x"></i> View Order (For Admin)  </button>

  <div class="panel">
  <p> URL : /admin/order</p>
  <p> METHOD : POST</p>
  <p> PARAM : </p>
  
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
    </ul>


</div>
<button class="accordion"><i class="fa fa-lock fa-2x"></i> Update  Order (For Admin)  </button>

  <div class="panel">
  <p> URL : /admin/order/update</p>
  <p> METHOD : POST</p>
  <p> PARAM : </p>
  
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
        <li>id  </li>
        <li>order_status (Processing,Shipped,Delivered) </li>
    </ul>


</div>




<button class="accordion"><i class="fa fa-lock fa-2x"></i> Create Order (For Customer)  </button>

  <div class="panel">
  <p> URL : /orde/create</p>
  <p> METHOD : POST</p>
  <p> PARAM : </p>
  
  <ul>
        <li>token</li>
        <li>Or Authorization: Bearer  &lt;token&gt;  </li>
        <li>phone</li>
        <li>address</li>
        <li>items (cart items)</li>
        
    </ul>


</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

</body>
</html>
