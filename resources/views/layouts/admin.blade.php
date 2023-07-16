<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>A2Z SERVICE | @yield('title')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('public/contents/admin')}}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{asset('public/contents/admin')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/contents/admin')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/contents/admin')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- summernote richtext-->
  <link rel="stylesheet" href="{{asset('public/contents/admin')}}/plugins/summernote/summernote-bs4.css">
    <!-- toaster -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{asset('public/contents/admin')}}/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            
            <div class="media">
              <img src="{{asset('public/contents/admin')}}/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            
            <div class="media">
              <img src="{{asset('public/contents/admin')}}/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> 
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.logout') }}" title="logout"><i class="fas fa-sign-out-alt" style="color: #17a2b8"></i> Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('public/contents/admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">A2Z Service</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      @php
        $admin_no = Auth::guard('admin')->user()->admin_no;
        $admin = DB::table('admins')->where('admin_no',$admin_no)->first();

      @endphp
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="height: 42px;width: 42px;" src="{{asset('public/uploads/'.$admin->admin_photo)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Setup
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('servicePercent')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service Percentage</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category & Subcat
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('subcategory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subcategory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('subcategory.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Subcategories</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Service Provider
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sp.reg')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service Provider Reg</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('sp.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Service Providers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('cat-wise-sp')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Wise SP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('AllCatWiseSPs.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Wise SP List</p>
                </a>
              </li>
              <!--  -->
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Services
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('service')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('service.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('approvedService.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('declinedService.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Services</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('order.pending')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('order.processing')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ongoing Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('order.completed')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.canceled')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User's Canceled Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.canceled')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin's Canceled Orders</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Payment
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('payment')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Receive Payment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('payment.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Payments</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('order.report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('earning.report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Earning Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('sp.earning.report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SP's Earning Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('payment.report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('due.report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Due Report</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Admin User
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.reg')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Admins</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header" style="padding: 8px;"></div>
    
      @yield('content')


    
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="">A2Z SERVICE</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.2
    </div>
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('public/contents/admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('public/contents/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/contents/admin')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/contents/admin')}}/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('public/contents/admin')}}/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('public/contents/admin')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('public/contents/admin')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('public/contents/admin')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('public/contents/admin')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- Summernote richtext-->
<script src="{{asset('public/contents/admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('public/contents/admin')}}/plugins/chart.js/Chart.min.js"></script>
<script src="{{asset('public/contents/admin')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('public/contents/admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- select 2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
      $("select.search").select2();
</script>

<!-- PAGE SCRIPTS -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<script>
  $(function () {
    // Summernote
    $('.textarea_').summernote()
  })
</script>

<!-- toaster start -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script>
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
          case 'info':
                 toastr.info("{{ Session::get('messege') }}");
          break;
          case 'success':
                 toastr.success("{{ Session::get('messege') }}");
          break;
          case 'warning':
                  toastr.warning("{{ Session::get('messege') }}");
          break;
          case 'error':
                  toastr.error("{{ Session::get('messege') }}");
          break;
        }
      @endif
  </script>
<!-- toaster end -->

<!-- sweet alert -->
  <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
  <script>
      $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
          title: "Are you sure want to delete?",
          text: "Once Delete, This will be Permanently Deleted!",
          type: "warning",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.href = link;
            } else {
              swal("Cancelled", "Your imaginary data is safe :)", "error");
            }
        });
      });
    </script>

    <script>
      $(document).on("click", "#edit", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
          title: "Are you sure want to Update?",
          type: "success",
          icon: "success",
          buttons: true,
          dangerMode: true,
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.href = link;
            } else {
              swal("Cancelled", "Your imaginary data is safe :)", "error");
            }
        });
      });
    </script>

    <script>
      $(document).on("click", "#inactive", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
          title: "Are you sure want to inactive?",
          text: "Once inactived, Some features may not be accessed by the user!",
          type: "warning",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.href = link;
            } else {
              swal("Cancelled", "Your imaginary data is safe :)", "error");
            }
        });
      });
    </script>

    <script>
      $(document).on("click", "#active", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
          title: "Are you sure want to activate?",
          text: "Once activated, Some features may be changed for this user!",
          type: "success",
          icon: "success",
          buttons: true,
          dangerMode: true,
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.href = link;
            } else {
              swal("Cancelled", "Your imaginary data is safe :)", "error");
            }
        });
      });
    </script>

    <script>
      $(document).on("click", "#decline", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
          title: "Are you sure want to decline?",
          text: "Once declined, Users will not get the access of this data!",
          type: "warning",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.href = link;
            } else {
              swal("Cancelled", "Your imaginary data is safe :)", "error");
            }
        });
      });
    </script>

    <script>
      $(document).on("click", "#approve", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
          title: "Are you sure want to approve?",
          text: "Once approved, this data will be visible to permitted users!",
          type: "success",
          icon: "success",
          buttons: true,
          dangerMode: true,
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.href = link;
            } else {
              swal("Cancelled", "Your imaginary data is safe :)", "error");
            }
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
       /* $(".isInvalid").keyup(function(){
          var stingLen = $('.isInvalid').val().length;
          if (stingLen >=1) {
            $(".isInvalid").removeClass("is-invalid");
            $(".invalidText").hide();
          

          }
        });*/

        /*$(".errorAlert").fadeTo(3000, 500).slideUp(500, function(){
            $(".errorAlert").alert('close');
        });*/
      });
    </script>



    <!-- ajax scripts

    ====================================================
       get subcategory based on category using ajax!!!!!
    ====================================================

     -->

     <script type=text/javascript>
        $('#category_no').change(function(){
          var category_no = $(this).val();  
          if(category_no){
            $.ajax({
              type:"GET",
              url:"{{url('ajax-get-subcat')}}?category_no="+category_no,
              success:function(res){        
              if(res){
                $("#subcategory_no").empty();
                $("#subcategory_no").append('<option value="-1" disabled selected>--Select Subcategory--</option>');
                $.each(res,function(key,value){
                  $("#subcategory_no").append('<option value="'+key+'">'+value+'</option>');
                });

                $("#user_no").append('<option value="-1" disabled selected>--Service Provider--</option>');
              
              }else{
                $("#subcategory_no").empty();
              }
              }
            });
          }else{
            $("#subcategory_no").empty();
            $("#user_no").empty();
          }   
        });

        $('#subcategory_no').on('change',function(){
          var subcategory_no = $(this).val();  
          if(subcategory_no){
            $.ajax({
              type:"GET",
              url:"{{url('ajax-get-sp')}}?subcategory_no="+subcategory_no,
              success:function(res){        
              if(res){
                $("#user_no").empty();
                $("#user_no").append('<option value="-1" disabled selected>--Service Provider--</option>');
                $.each(res,function(key,value){
                  $("#user_no").append('<option value="'+key+'">'+value+'</option>');
                });
              
              }else{
                $("#user_no").empty();
              }
              }
            });
          }else{
            $("#user_no").empty();
          }
            
          });


          $('#service_charge').keyup(function(){
            var service_charge = $(this).val(); 
            var service_percentage = $("#service_percentage").val();
            var percentAmt = (service_charge * service_percentage) / 100;
             $('#service_percent_amount').val(percentAmt);
          });


          $('#createService').on('click',function(){
          var subcategory_no = $("#subcategory_no").val();
          var service_charge = $("#service_charge").val();
          //alert(service_charge)
          if(subcategory_no){
            $.ajax({
              type:"GET",
              url:"{{url('ajax-get-sp')}}?subcategory_no="+subcategory_no,
              success:function(res){        
              if(res){
                $("#user_no").empty();
                $("#user_no").append('<option value="-1" disabled selected>--Service Provider--</option>');
                $.each(res,function(key,value){
                  $("#user_no").append('<option value="'+key+'">'+value+'</option>');
                });
              
              }else{
                $("#user_no").empty();
              }
              }
            });
          }else{
            $("#user_no").empty();
          }
            
          });


          //get payment details
          $('#payment_sp').on('change',function(){
             var payment_sp = $(this).val();  
             if(payment_sp){
              $.ajax({
                type:"GET",
                url:"{{url('ajax-get-payment-dlt')}}?user_no="+payment_sp,
                success:function(res){        
                  if(res){
                    $("#previous_due_amt").val(res);
                  }
                }
              });
            }
          });

          $('#payment_amount').keyup(function(){
            var payment_amount = $(this).val(); 
            var previous_due_amt = $("#previous_due_amt").val();
            if(parseInt(payment_amount) > parseInt(previous_due_amt)) {
              alert("Paid amount can not be larger than due amount!");
              $(this).val("");
              $('#payment_due_amt').val("");
              return;
            }
            var newDueAmt = previous_due_amt - payment_amount;
            $('#payment_due_amt').val(newDueAmt);
          });
      </script>

    <style type="text/css">
      .select2-container--default .select2-selection--single{
        padding: 6px 0px;
        height: 38px;
        border: 1px solid #aaa;
      }
      .select2-container--default .select2-selection--single .select2-selection__arrow{
        height: 38px;
      }

      #delete.btn-danger,#edit.btn-info,#inactive.btn-danger,#active.btn-info,  #decline.btn-danger,#approve.btn-info{margin-bottom: 5px;}


      .text_ {
         overflow: hidden;
         text-overflow: ellipsis;
         display: -webkit-box;
         -webkit-line-clamp: 8; /* number of lines to show */
         -webkit-box-orient: vertical;
      }
    </style>
</body>
</html>
