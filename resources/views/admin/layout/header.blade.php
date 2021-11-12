@php
    use App\Models\Comment;
@endphp
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$title}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/admin/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/admin/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/admin/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="/admin/dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="/admin/dist/css/custom-style.css">
  <style>
      .breadcrumb a{
          color: #6c757d;
      }
      .breadcrumb{
          float: right;
          text-align: center;
      }
      .a{
          display: none;
      }
      @media only screen and (max-width: 600px) {
        .a{
            display: block;
        }
      }
  </style>
  @yield('style')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item" id="item">
        <a class="nav-link a" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>


  </nav>
  <!-- /.navbar -->

   @include('admin.layout.menu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12" >
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="fa fa-home"></i></a></li>
              <li class="breadcrumb-item active"><a href='#'>{{$title}}</a></li>
            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

