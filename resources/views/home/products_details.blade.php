<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
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
         <!-- slider section -->

      <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%;">

           <div class="img-box" style="padding: 20px;">
              <img src="products/{{ $product->image }}" alt="">
           </div>
           <div class="detail-box">
              <h5>
                 {{ $product->title }}
              </h5>

              @if($product->discount_price != null)
              <h6 style="color:red;">
               Discount Price
               <br>
               ${{ $product->discount_price }}
              </h6>
              <h6 style="text-decoration:line-through;color:blue;">
               Price
               <br>
                 ${{ $product->price }}
              </h6>

              @else
              <h6 style="color:blue;">
               Price
               <br>
               ${{ $product->price }}
            </h6>
              @endif
              <h6>
                Product Category: {{ $product->category }}
              </h6>
              <h6>
                Product Description: {{ $product->description }}
              </h6>
              <h6>
                Product Quantity: {{ $product->quantity }}
             <div>
                <form action="{{url('/add_carts')}}" method="POST">
                    @csrf
                    <div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}" id="">
                    </div>
                    <div class="row ">
                       <div class="col-md-4">
                           <input type="number" name="quantity" value="1" min="1" style="width:100px;">
                       </div>
                       <div class="col-md-4">
                    {{-- <button class="btn btn-secondary" style="margin: auto; " href="{{ url('/add_cart/',$products->id) }}">Add To Cart</button> --}}
                        <input type="submit" value="Add To Cart">
                       </div>
                    </div>
                </form>
             </div>
        </div>
     </div>
      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>
