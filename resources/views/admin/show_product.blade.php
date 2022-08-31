<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')


  <style>
    .center{
        margin:auto;
        width:50%;
        border: 2px solid white;
        text-align: center;
        margin-top:50px;
    }
    .font_size{
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
    }
    .image_size{
        width:400%;
        height:400%;
    }
    .th_color{
        background: skyblue;
    }
    .th_design{
        padding:30px;
    }
  </style>
  </head>
  <body>
@yield('section')
      @include('admin.header')
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
            <button type="button" class="close float-end"  data-dismiss='alert' aria-hidden='true' >x</button>
            @endif
<form action="{{ url('/show_product') }}">
    <h2 class="font_size">All Products</h2>
            <table class="center">
                <thead class="th_color">
                    <tr>
                        <th class="th_design">Product Title</th>
                        <th class="th_design">Description</th>
                        <th class="th_design">Category</th>
                        <th class="th_design">Quantity</th>
                        <th class="th_design">Price</th>
                        <th class="th_design">Discount Price</th>
                        <th class="th_design">Product Image   </th>
                        <th class="th_design">Delete</th>
                        <th class="th_design">Edit</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price}}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td><img class="image_size" src="/products/{{ $product->image }}" alt=""></td>
                        <td><a onclick="return confirm('Are you sure to Delete' this)" href="{{ url('/delete_product',$product->id) }}" class="btn btn-danger">Delete</a></td>
                        <td><a href="{{ url('update_product',$product->id) }}" class="btn btn-success">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</form>
        </div>
      </div>

    <!-- plugins:js -->
   @include('admin.script')
