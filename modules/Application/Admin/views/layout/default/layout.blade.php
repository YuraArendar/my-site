<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Admin</title>

    <!-- Global stylesheets -->
        @include('admin::layout.'.$layout.'.styles')
    <!-- /global stylesheets -->

    @include('admin::layout.'.$layout.'.scripts')

</head>

<body class="navbar-top">

<script>
    $(document).ready(function(){
        {!! @$onLoad !!}
    });
</script>
<!-- Main navbar -->
    @include('admin::layout.'.$layout.'.inc.navbar')
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
            @include('admin::layout.'.$layout.'.inc.menu')
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">



                <div class="col-md-12">
                    @include('admin::layout.'.$layout.'.inc.page-header')
                    <div class="panel panel-white">
                        <div class="panel-body">
                             @yield('content')
                        </div>
                    </div>
                </div>
                <!-- Footer -->

                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
