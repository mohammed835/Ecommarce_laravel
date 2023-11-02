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
         <div class="container" style="    margin: 20px auto;
         width: 600px;">
           <div class="body" style="text-align: center;">
               <img src="product/{{ $product->image }}" style="
               display: block;
               text-align: center;
               border-radius: 15%;
               margin: 10px;
               border: 1px solid #f50;
               padding: 4px;" height="450px" width="600px " alt="">
               <span style="float: left; color:#f00; text-decoration: line-through; font-size:17px">{{ $product->price }}</span>
               <span style="float: right;font-size:20px">{{$product->price - $product->discount_price }}</span>
               <br>
               <p>{{ $product->description }} </p>
               <p>Available quantity is {{ $product->available_quantity }} </p>

                <a href="#" class="btn btn-primary">Add To Cart</a>
           </div>
         </div>
      </div>
     
   
      <!-- footer start -->
@include('home.footer')