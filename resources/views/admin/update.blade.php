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
        .test{
            width: 400px;
            margin: 15px auto;
            border-radius: 20%;
            color: #000;
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
                <h2>Update Product</h2>
                <form action="{{ route('storeProdcut',$product->id) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    {{-- // title	description	iamge	category	quantity	price	discount_price	 --}}

                    <div class="form-group">
                        <input type="text" name="title" class="test form-control"  value={{ $product->title }}>
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" class="test form-control" value={{ $product->description }}>
                    </div>
                    <div class="form-group">
                        <input type="number" name="quantity" class="test form-control" min="0" value={{ $product->quantity }}>
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" class="test form-control" min="0" value={{ $product->price }}>
                    </div>
                    <div class="form-group">
                        <input type="number" name="discount_price" class="test form-control" min="0" value={{ $product->discount_price }}>
                    </div>
                    <div class="form-group">
                        <label> current image :</label>
                        <img src="product/{{$product->image}}" width="100px" height="100px" alt=""style="margin:10px auto; display:block">
                        <input type="file" style="color: #fff" name="image" class="test form-control" >
                    </div>
                    <div class="">
                        <label for=""  style="font-size:15px">category</label>
                        <select name="category" id="" style="color: #000">
                            @foreach ($Categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach 
                        </select>
                    </div><br>
                    <input class="btn btn-primary" style="font-size:20px" value="Add Product" type="submit" name="submit">
                </form>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>