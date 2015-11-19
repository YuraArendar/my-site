@extends('admin::layout.default.layout')

@section('content')

    <div class="col-sm-6">
        <div class="mb-md">
            {!! link_to_action('\Application\Admin\Http\Controllers\StructureController@getCreate',"Add",array(),['class'=>'btn btn-primary']) !!}
        </div>
    </div>

    <div class="dd" id="nestable">

        {!! $view !!}

    </div>
@endsection