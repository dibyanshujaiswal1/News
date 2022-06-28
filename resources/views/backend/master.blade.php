<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.psdtohtmlexpert.com/admin/sunny-admin-template/main-dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 05:35:18 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sunny Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="https://html.psdtohtmlexpert.com/admin/sunny-admin-template/assets/icons/feather-icons/feather.min.js"></script>
    <script src="https://html.psdtohtmlexpert.com/admin/sunny-admin-template/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
    <script src="https://html.psdtohtmlexpert.com/admin/sunny-admin-template/assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
    <script src="https://html.psdtohtmlexpert.com/admin/sunny-admin-template/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

    <!-- Sunny Admin App -->
    <script src="{{asset('backend/js/template.js')}}"></script>
    <script src="{{asset('js/pages/dashboard.js')}}"></script>
    <script>
  $(document).ready(function() {
    $('.toggle-class').check(function() {
        alert('Do you want to change your status')
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var categorystatus_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/change-status',
            data: {'status': status, 'categorystatus_id': categorystatus_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
  
  </script>

</body>

<!-- Mirrored from html.psdtohtmlexpert.com/admin/sunny-admin-template/main-dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 05:36:26 GMT -->

</html>