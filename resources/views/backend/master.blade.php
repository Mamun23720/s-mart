<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>S-Mart</title>

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/checkbox-04/css/style.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/jqvmap/jqvmap.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

    @notifyCss


    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>



<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">



<!-- Header -->



        <header>

            <nav class="main-header navbar navbar-expand navbar-white navbar-light">


                @include('backend.partials.header')


            </nav>

        </header>



<!-- Header -->


<!-- Sidebar -->




        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            @include('backend.partials.sidebar')

        </aside>




<!-- Sidebar -->


<!-- Body -->




        <div class="content-wrapper">

            <section class="content">

            @include('notify::components.notify')

                @yield('content')



            </section>



        </div>




<!-- Body -->


        <!-- @include('backend.partials.footer') -->

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


    @stack('js')

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/chart.js/Chart.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/jquery-knob/jquery.knob.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/moment/moment.min.js"></script>

    @notifyJs

    <script src="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.js?v=3.2.0"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/pages/dashboard.js"></script>


    <script src="https://preview.colorlib.com/theme/bootstrap/checkbox-04/js/popper.js"></script>


    <script src="https://preview.colorlib.com/theme/bootstrap/checkbox-04/js/main.js"></script>



</body>

</html>
