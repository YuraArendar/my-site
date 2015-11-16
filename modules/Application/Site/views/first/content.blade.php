@extends('site::first.layout')

@section('content')

    @include('site::first.inc.menu')<!-- #menu -->

    @include('site::first.parts.home')<!-- #section-intro -->

    @include('site::first.parts.about')<!-- #section-about -->

    @include('site::first.parts.services')<!-- #section-services -->

    @include('site::first.parts.team')<!-- #section-team -->

    @include('site::first.parts.portfolio')<!-- #section-portfolio -->

    @include('site::first.parts.blog')<!-- #section-blog -->

    @include('site::first.parts.contact')<!-- #section-contact -->


    <!-- Popup windows -->

    @include('site::first.popups.send_resume')<!-- #popup-send-resume -->

    @include('site::first.popups.portfolio1')<!-- #popup-portfolio-1 -->

    @include('site::first.popups.portfolio2')<!-- #popup-portfolio-2 -->

    @include('site::first.popups.portfolio3')<!-- #popup-portfolio-3 -->

    @include('site::first.popups.blog1')<!-- #popup-blog-1 -->

    @include('site::first.popups.blog2')<!-- #popup-blog-2 -->

    @include('site::first.popups.blog3')<!-- #popup-blog-3 -->

    @include('site::first.popups.blog4')<!-- #popup-blog-4 -->

    @include('site::first.popups.blog5')<!-- #popup-blog-5 -->

    @include('site::first.popups.blog6')<!-- #popup-blog-6 -->

    @include('site::first.popups.map')<!-- #popup-blog-6 -->

@endsection