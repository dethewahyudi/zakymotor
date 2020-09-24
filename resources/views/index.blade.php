<html>
<head>
  <meta charset="utf-8">
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 

  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
{{--   <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> --}}
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

 <link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.css">



{{---typerwriter --}}

  
<style type="text/css">
  .nav-pills .nav-link.active, .nav-pills .show > .nav-link{
    background-color: #f00;
  }

  *{
    padding: 0px;
    margin: 0px;
  }

  a.nav-link:hover{
    background-color: #fda0a0;
  }


</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed" ng-app="app" ng-controller="zakymotor">
<div class="wrapper" >


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" >
  
    <!-- Left navbar links -->
    <ul class="navbar-nav" >

      <li class="nav-item">
       {{--  <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a> --}}
&nbsp;&nbsp;<B>@yield('atas')</B>
      </li>
     
    </ul>
    <div style="position: absolute;right: 00px;">
          <img style="width: 30px;height: 30px;" src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">&nbsp;&nbsp;
          {{ $user }}
          &nbsp;&nbsp;
        {{--   <i class="fas fa-ellipsis-v"></i> --}}

  
  <button type="button" class="btn" data-toggle="dropdown">
    <i class="fas fa-ellipsis-v"></i>
  </button>
  <div class="dropdown-menu">
   {{--  <a class="dropdown-item" href="#">Link 1</a> --}}
    <a href="{{ route('login') }}" class="dropdown-item">
              <i class="nav-item fa fa-sign-out"></i>
              Logout
    </a>
  </div>


   </div>
	
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar  elevation-4">
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/ZM.jpg" class="elevation-2" alt="User Image">
        </div>
        <div class="info">
          <B>ZAKYMOTOR</B>
        </div>
      </div>


     {{--  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ $user }}</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


            <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link @yield('home')">
              <i class="nav-icon fa fa-line-chart"></i>
              <p>Halaman Utama</p>
            </a>
          </li>

		 <li class="nav-item has-treeview @yield('transaksi')">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit "></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left "></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="{{ route('tpenjualan') }}" class="nav-link @yield('penjualan')">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tpembelian') }}" class="nav-link @yield('pembelian')">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Input Barang</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('tpembayaran') }}" class="nav-link @yield('pembayaran')">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Pembayaran</p>
                </a>
              </li>
             
            </ul>
          </li> 

      

          <li class="nav-item has-treeview @yield('master')">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('mbarang') }}" class="nav-link @yield('stok')">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Stok Barang</p>
                </a>
              </li>

                 <li class="nav-item">
                <a href="{{ route('muser') }}" class="nav-link @yield('user')">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
    
             
            </ul>
          </li> 

         <?php if($status=='user') { ?>
          <?php }else{ ?>
          <li class="nav-item has-treeview @yield('report')">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('rpenjualan') }}" class="nav-link @yield('rpenjualan')">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Report Penjualan</p>
                </a>
              </li>

                 <li class="nav-item">
                <a href="{{ route('rpembelian') }}" class="nav-link @yield('rpembelian')">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Report Pembelian</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('rhutang') }}" class="nav-link @yield('rhutang')">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Report Hutang/Piutang</p>
                </a>
              </li>
    
             
            </ul>
          </li> 
          <?php } ?> 

        {{--  <li class="nav-item ">
            <a href="{{ route('login') }}" class="nav-link">
              <i class="nav-item fa fa-sign-out"></i>
              <p>Logout</p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   {{--   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> --}}
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


      	
@yield('content')

      
        


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{-- <script src="assets/plugins/jquery/jquery.min.js"></script> --}}
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="assets/dist/js/pages/dashboard.js"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>


   {{-- <script src="assets/js/custom.js" type="text/javascript"></script> --}}



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="assets/angularjs_datatables/angular.min.js"></script>
<script src="assets/js/jquery.mask.min.js"></script>

<link rel="stylesheet" href="assets/angularjs_datatables/jquery.dataTables.min.css" />
  <script data-require="jquery@1.10.1" data-semver="1.10.1" src="assets/angularjs_datatables/jquery-1.10.1.min.js"></script>
    <script src="assets/angularjs_datatables/jquery.dataTables.min.js"></script>

    <script src="assets/angularjs_datatables/angular-datatables.js"></script>
  <script src="assets/angularjs_datatables/angular-datatables.directive.js"></script>
  <script src="assets/angularjs_datatables/angular-datatables.factory.js"></script>
  <script src="assets/angularjs_datatables/angular-datatables.bootstrap.js"></script>
   <script src="assets/js/custom.js" type="text/javascript"></script>
  </html>

<script type="text/javascript">
  

    // Format mata uang.
    $( '#Jumlah' ).mask('000,000,000', {reverse: true});
    $( '#HargaBeli' ).mask('000,000,000', {reverse: true});
    $( '#HargaJual' ).mask('000,000,000', {reverse: true});
    // $( '#kredit' ).mask('000,000,000', {reverse: true});

    $( '#Nominal' ).mask('00,000,000', {reverse: true});


    $( '#Tahun' ).mask('0000');
    $( '#Nik' ).mask('0000000000000000');
    $( '#Tenor' ).mask('00');
    $( '#Cc' ).mask('000');
    $( '#Bunga' ).mask('00');


    // Format nomor HP.
    $( '#Handphone' ).mask('0000-0000-0000');



</script>



{{---Auto Format Currency (Money) With jQuery --}}

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript" src="assets/js/simple.money.format.js"></script>
  <script type="text/javascript">
    $('#Jumlah').simpleMoneyFormat();
    $('#HargaBeli').simpleMoneyFormat();
    $('#HargaJual').simpleMoneyFormat();
  </script>

 --}}

</body>
</html>
