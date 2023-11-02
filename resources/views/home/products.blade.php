<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">  
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{ route('prodcut_details',$product->id) }}" class="option1">
                        
                     product details
                     
                     </a>
                     
                     <form action="{{ route('add_cart',$product->id) }}" method="post">
                        @csrf
                        <input type="number" min="1" value="1" name="quantity">
                        <input type="submit" value="Add To Cart">
                     </form>


                  </div>
               </div>
               <div class="img-box">
                  <img src="product/{{$product->image }}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{ $product->title }}
                  </h5>
                  <h6 style="text-decoration: line-through">
                     {{ $product->price }}
                  </h6>
                  <h6 >
                     {{ $product->price - $product->discount_price }}
                  </h6>
               </div>
            </div>
         </div>
         @endforeach
       </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>