@extends('admin::layout.'.$layout.'.layout')

@section('content')


    {!! Form::open([
    'method'=>'POST',
    'class'=>'form-horizontal form-bordered',
    'onsubmit'=>'return Main.formSubmit(this);',
    'url'=>Route('update_content', ['id'=>@$content['id']]),
    'files' => true
    ]) !!}

    @include('admin::'.$template.'.form')

    {!! Form::close() !!}

@endsection