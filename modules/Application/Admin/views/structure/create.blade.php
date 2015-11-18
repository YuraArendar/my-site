@extends('admin::layout.default.layout')

@section('content')

    <form class="form-horizontal" method="post" onsubmit="return Main.formSubmit(this);" action="{{ action('\Application\Admin\Http\Controllers\StructureController@postStore') }}">
        @include('admin::structure.form')
    </form>

@endsection