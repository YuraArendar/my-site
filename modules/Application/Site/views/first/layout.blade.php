<!DOCTYPE html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" xml:lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
    @include('site::first.meta')

    @include('site::first.styles')
</head>

<body>

    @include('site::first.inc.page_loader')<!-- #page-loader -->

<div id="all">


    @yield('content')



    <a href="#" id="to-top">
        	<span id="top-arrow-1">
        		<i class="fa fa-angle-up"></i>
            </span>

            <span id="top-arrow-2">
            	<i class="fa fa-angle-up"></i>
      		</span>
    </a>

    <div id="page-screen-cover"></div>
</div><!-- #all -->

@include('site::first.scripts')

</body>
</html>
