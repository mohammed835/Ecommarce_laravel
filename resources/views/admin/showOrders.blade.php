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
            <div class="div_center">
                <h2>Show Orders</h2>
            </div>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">address</th>
                    <th scope="col">quantity</th>
                    <th scope="col">price</th>
                    <th scope="col">product_title</th>
                    <th scope="col">payment_status</th>
                    <th scope="col">delivary_status</th>
                    <th scope="col">image</th>
                    <th scope="col">Deliverd</th>
                  </tr>
                </thead>
                <tbody>

{{-- // title	description	iamge	category	quantity	price	discount_price	 --}}
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivary_status }}</td>
                        <td>
                           <img src="product/{{ $order->image }}" alt="image" height="100px" width="100px">
                        </td>
                        @if ($order->delivary_status == 'processing' )
                        <td>
                            <a href="{{ route('delivary',$order->id) }}" onclick="confirm('Are you sure order is receive? ')" class="btn btn-primary"> delivaried	</a>
                        </td>
                        @else
                           <td>
                              delivaried
                            </td> 
                        @endif
                        

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