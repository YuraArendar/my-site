@extends('admin::layout.default.layout')

@section('content')


    {!! Form::open([
    'method'=>'POST',
    'class'=>'form-horizontal form-bordered',
    'onsubmit'=>'return Main.formSubmit(this);',
    'url'=>Route('update_structure', ['id'=>@$structure['id']])
    ]) !!}

    @include('admin::structure.form')

    {!! Form::close() !!}

@endsection