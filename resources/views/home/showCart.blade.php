<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <div class="container" style="margin: 20px auto;" >
            <h1>Cart Page</h1>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    {{-- name	email	phone	address	product_title	price	quantity	image	product_id	user_id  --}}
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">address</th>
                    <th scope="col">product_title</th>
                    <th scope="col">price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">image</th>
                    <th scope="col">total_price</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->email }}</td>
                        <td>{{ $product->phone }}</td>
                        <td>{{ $product->address }}</td>
                        <td>{{ $product->product_title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                           <img src="product/{{ $product->image }}" alt="image" height="100px" width="100px">
                        </td>
                        <td>{{ $product->total_price }}</td>
                        <td>
                            <a href="{{ route('remove_cart',$product->id) }}" onclick="confirm ('are you sure to delete that product')" class="btn btn-danger"> delete</a>
                            <a href="#" class="btn btn-primary"> update</a>
                        </td>

                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
              <?php 
                    $sum = 0 ; 
               ?>
                     @foreach ($products as $product)
                        <?php $sum += $product->total_price ?>
                     @endforeach
                    <div style="    text-transform: capitalize;
                                   font-weight: bold;"
                    >
                        total price of all orders : 
                        <span style="
                                        background: #000;
                                        color: #ff0;
                                        font-size: 25px;
                                        padding: 10px;
                                        border-radius: 15%;
                                        border: 3px solid #ff0;
                                    ">{{ $sum }}</span> 
                     </div> 

                     <div style="    text-align: center;margin: 6%;">
                        <h2>proceed to order</h2>
                        <a href="{{ route('cash_order') }}" class="btn btn-primary">Cash On Delivery</a>
                        <a href="#" class="btn btn-secondary">Pay Using Card</a>
                     </div>
                   
         </div>
      </div>
     
   
      <!-- footer start -->
@include('home.footer')