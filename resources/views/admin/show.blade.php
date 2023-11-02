<!DOCTYPE html>
<html lang="en">
  <head>
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
            margin: 10px auto;
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
            <div class="div_center">
                <h2>Show Product</h2>
            </div>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">description</th>
                    <th scope="col">iamge</th>
                    <th scope="col">category</th>
                    <th scope="col">quantity</th>
                    <th scope="col">price</th>
                    <th scope="col">discount_price</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>

{{-- // title	description	iamge	category	quantity	price	discount_price	 --}}
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                           <img src="product/{{ $product->image }}" alt="image" height="100px" width="100px">
                        </td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td>
                            <a href="{{ route('deleteProduct',$product->id) }}" onclick="confirm ('are you sure to delete that category')" class="btn btn-danger"> delete</a>
                            <a href="" class="btn btn-primary"> update</a>
                        </td>

                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>

    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>