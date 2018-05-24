@extends('main')

@section('content')
    <h1>Create Todo</h1>
    {!! Form::open(['route' => 'todo.store']) !!}
    
        {{ Form::bsText('text') }}
        {{ Form::bsTextArea('body') }}
        {{ Form::bsText('due') }}
        {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary btn-lg']) }}

    {!! Form::close() !!}
@endsection
