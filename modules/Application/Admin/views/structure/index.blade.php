@extends('admin::layout.default.layout')

@section('content')

    <div class="col-sm-6">
        <div class="mb-md">
            <a href="/admin/structure/create" class="btn btn-primary">Add</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="dd" id="nestable">

            {!! $view !!}

        </div>
    </div>

@endsection