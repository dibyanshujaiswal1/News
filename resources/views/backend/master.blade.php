<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sunny Admin - Dashboard</title>
    <link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
       @include("backend.layouts.header")
        <!-- Left side column. contains the logo and sidebar -->
       @include("backend.layouts.sidebar")
         <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
       @yield('content')
        </div>
        <!-- /.content-wrapper -->
       @include("backend.layouts.footer")
        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- Vendor JS -->
    <script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('backend/js/page/data-table.js')}}"></script>
    <script src="https://html.psdtohtmlexpert.com/admin/sunny-admin-template/assets/icons/feather-icons/feather.min.js"></script>
    <script src="https://html.psdtohtmlexpert.com/admin/sunny-admin-template/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
    <script src="https://html.psdtohtmlexpert.com/admin/sunny-admin-template/assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
    <script src="https://html.psdtohtmlexpert.com/admin/sunny-admin-template/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
    <!-- Sunny Admin App -->
    <script src="{{asset('backend/js/template.js')}}"></script>

 

    <!-- <script src="{{asset('js/pages/dashboard.js')}}"></script> -->

</body>
</html>