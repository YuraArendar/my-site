@extends('admin::layout.'.$layout.'.layout')

@section('content')


    {!! Form::open([
       'method'=>'POST',
       'class'=>'form-horizontal',
       'onsubmit'=>'return Main.formSubmit(this);',
       'url'=>Route('create_new_content')
       ]) !!}

        @include('admin::content.form')

    {!! Form::close() !!}

@endsection