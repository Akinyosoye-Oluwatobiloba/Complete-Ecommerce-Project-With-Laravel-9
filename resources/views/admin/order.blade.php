<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <style>
    .title_deg{
        text-align: center;
        font-size: 2px;
        font-weight: bold:
        padding-bottom:40px;

    }
    .table_deg{
        border: 2px solid white;
        width:100%;
        margin:auto;
        position: relative;
        text-align: center;
    }
    .th_deg{
        background:skyblue;
    }
    .img_size{
        width:200px;
        height: 100px;
    }
  </style>
  </head>
  <body>
@yield('section')
      @include('admin.header')
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

      <h1 class="title_deg" >All Orders</h1>

      <table class="table_deg">
        <thead>
            <tr class="th_deg">
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product  Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
                <th>Delivered</th>
                <th>Print PDF</th>
                 <th>Send Email</th>

            </tr>
        </thead>
        @foreach($orders as $order)
        <tbody>
            <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{$order->address }}</td>
                <td>{{$order->phone}}</td>
                <td>{{ $order->product_title }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{$order->delivery_status}}</td>
                <td >
                    <img src="/products/{{ $order->image }}" alt="" class="img_size">
                </td>
                <td>
                    @if($order->delivery_status =='processing')
                    <a onclick="return confirm('Are You sure this Product is Delivered')" href="{{ url('/delivered',$order->id) }}" class="btn btn-primary">Delivered</a>
                    @else
                    <p style="color: green;" >Delivered</p>
                @endif
               @if($order->delivery_status = 'delivered')
                <a onclick="return confirm('Are you this product has not been delivered?')" href="{{ url('/cancel_delivery',$order->id) }}" class="btn btn-danger">Cancel Delivery</a>
                @endif
            </td>
            <td><a href="{{ url('print_pdf',$order->id) }}" class="btn btn-secondary">Print PDF</a></td>
            <td><a href="{{ url('/send_email',$order->id) }}" class="btn btn-info">Send Email</a></td>
            </tr>
        </tbody>
        @endforeach
      </table>
        </div>
      </div>
    <!-- plugins:js -->
   @include('admin.script')
