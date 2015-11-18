
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
        @include('admin::layout.default.styles')
    <!-- /global stylesheets -->

    @include('admin::layout.default.scripts')

    <script>
        $(document).ready(function(){
            {!! @$onLoad !!}
        });
    </script>
</head>

<body class="navbar-top">

<!-- Main navbar -->
    @include('admin::layout.default.inc.navbar')
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
            @include('admin::layout.default.inc.menu')
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h6 class="panel-title">{{ $title }}</h6>

                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i> <span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="/admin/structure/create">Add new {{ $itemName }}</a></li>
                                            <li><a href="#">----</a></li>
                                            <li><a href="#">----</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">----</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

                        <div class="panel-body">
                             @yield('content')
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                @include('admin::layout.default.inc.footer-text')
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
