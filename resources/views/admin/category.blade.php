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
                <h2>Add Category</h2>
                <form action="{{ route('add_category') }}" method="post">
                    @csrf
                    <input class="name" type="text" name="name" placeholder="name of category">
                    <input class="btn btn-primary" type="submit" name="submit">
                </form>
            </div>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">category_name</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{route('delete_category',$category->id)}}" onclick="confirm ('are you sure to delete that category')" class="btn btn-danger"> delete</a>
                            <a href="#" class="btn btn-primary"> update</a>
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