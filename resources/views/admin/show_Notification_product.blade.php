<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            font-size: 25px;
            
        }
        .div_center h2 {
            margin: 30px;

        }
        .name {
            color: #000;
            margin: 10px auto ;
            display: block;
        }
        table{
            margin: 10px auto ;

        }
        
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
    <!-- container-scroller -->
    <div class="main-panel">
        <div class="content-wrapper">
            {{ $product }}x
        </div>
    </div>
    

    
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>