<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
<style>
    .div_center{
        text-align: center;
        padding-top:40px;
    }
    .font_size{
        font-size:40px;
        padding-bottom:40px;
    }
    .text_color{
        color:black;
        padding-bottom:20px;
    }
    label{
        display:inline-block;
        width:200px;
    }
    .div_design{
        padding-bottom:50px;
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
        <div class="div_center">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close float-end"  data-dismiss='alert' aria-hidden='true' >x</button>
                {{ session()->get('message') }}</div>

            @endif
            <form action="{{ url('update_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="font_size">Add products</h1>
            <div class="div_design">
                {{-- @foreach ($product as $products) --}}


            <label for="">Product Title: </label>
            <input class="text_color" type="text" value="{{ $product->title }}" name="title" placeholder="write a title" required="">

            </div>
            <div class="div_design">
                <label for="">Product Decription: </label>
                <input class="text_color" type="text" value="{{ $product->description }} " name="description" placeholder="write a descripion" required="">

                </div>
                <div class="div_design">
                    <label for="">Product Image: </label>
                    <input class="text_color" type="file" name="image" placeholder="" required="">
                </div>
                <div class="div_design">
                    <img style="margin:auto;" src="/products/{{ $product->image }}" alt="">
                </div>
                <div class="div_design">
                    <label for="">Category</label>
                    <select name="category" class="text_color" >
                        <option value="{{ $product->category}}" selected="">Add Category Here</option>
                        {{-- @foreach ($product as $product)
                        <option value="{{ $product->category }}">{{ $category->category_name }}</option>
                        @endforeach --}}
                    </select>
                    </div>
                <div class="div_design">
                    <label for="">Product Price : </label>
                    <input class="text_color" type="number" value=" {{$product->price}}" name="price" min="0" placeholder="write a price" required="">

                    </div>
                    <div class="div_design">
                        <label for="">Discount Price: </label>
                        <input class="text_color" type="number" value=" {{ $product->discount_price }}" name="discount_price" placeholder="write a discount">

                        </div>
                    <div class="div_design">
                        <label for="">Product Quantity: </label>
                        <input class="text_color" type="number" name="quantity" value=" {{$product->quantity }}" placeholder="write a quantity" required="">

                        </div>
                <div class="div_design">
                    <input type="submit" value="Update Product" class="btn btn-primary ">
                </div>
                {{-- @endforeach --}}
            </form>
        </div>


    </div>
    </div>
    </body>

    <!-- plugins:js -->
   @include('admin.script')
