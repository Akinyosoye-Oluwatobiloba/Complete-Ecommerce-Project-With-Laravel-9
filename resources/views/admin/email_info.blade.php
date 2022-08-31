<!DOCTYPE html>
<html lang="en">
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

            <h1 style="text-align: center; font-size:25px;">Send Email to {{ $order->email }}</h1>

        <form action="{{ route('emailsend') }}">
            <div >
                <label for="">Email Greeting</label>
                <input type="text" name="greeting">

            </div>
            <div >
                <label for="">Email First Line</label>
                <input type="text" name="firstline">

            </div>
            <div >
                <label for="">Email Body</label>
                <input type="text" name="body">

            </div>
            <div >
                <label for="">Email Url: </label>
                <input type="text" name="url">

            </div>
            <div>
                <label for="">Email Lastline: </label>
                <input type="text" name="lastline">

            </div>


            <button class="btn btn-primary">Send Email</button>
            </form>
            {{-- dingnggogg --}}
</div>
</div>





   @include('admin.script')
