<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="<?php echo csrf_token() ?>"/>
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    @include('admin::auth.styles')
    <!-- /global stylesheets -->

    @include('admin::auth.scripts')

</head>

<body>

    <!-- Main navbar -->
        @include('admin::auth.inc.navbar')
    <!-- /main navbar -->


<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Simple login form -->

                    @yield('form')

                <!-- /simple login form -->

                <!-- Footer -->
                    @include('admin::auth.inc.footer-text')
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
