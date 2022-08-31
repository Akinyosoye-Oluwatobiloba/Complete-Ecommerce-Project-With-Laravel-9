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

        <!-- partial -->
       @include('admin.body')          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          


    <!-- plugins:js -->
   @include('admin.script')
