<!DOCTYPE html>
<html lang="en">



<style>
    .div_center{
        text-align: center;
        padding-top:40px;
    }
    .h2_font{
        font-size:40px;
        padding-bottom:40px;

    }
    .input_color{
        color:black;
    }
    .center{
        margin:auto;
        width: 50%;
        text-align: center;
        margin-top: 30px;
        border: 3px solid white;
    }
</style>
  <head>
  @include('admin.css')
  </head>
  <body>
@yield('section')
      @include('admin.header')
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->



      <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close float-end"  data-dismiss ='alert' aria-hidden='true' >x</button>
                {{ session()->get('message') }}</div>
            @endif

            <div>
                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{ url('/add_category') }}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="category" placeholder="write category name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">

                    </form>



                </div>
                <div>


                </div>
                <table class="center">
                <thead>
                        <th>Category Name</th>
                        <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($data as $data)

                    <tr>
                        <td>{{$data->category_name }}</td>
                        <td><a onclick="return confirm('Are you sure you want to delete this')" href="{{ url('delete_category',$data->id) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>

        </div>
      </div>


    <!-- plugins:js -->
   @include('admin.script')
