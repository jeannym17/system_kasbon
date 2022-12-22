
<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">
  <title>IMST | {{$title}}</title>
<head>
  

<body >
     <!-- Sidebar -->
     @include('partials.sidebar')
     <!-- End Sidebar -->
 
    <!-- Navbar -->
  @include('partials.navbar')
    <!-- End Navbar -->
    
         @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
         <!-- Sidebar -->
     @include('partials.footer')
     <!-- End Sidebar -->

  </main>
  <!-- JS File -->
  @include('partials.jsfile')
  <!-- End JS File -->
</body>

</html>