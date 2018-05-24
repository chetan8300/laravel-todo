@extends('main')

@section('content')
    <a class="btn btn-primary" href="/">Go Back</a>
    
    <h1>Create Todo</h1>
    
    {!! Form::open(['route' => ['todo.update', $todo->id], 'method' => 'PUT']) !!}
    
        {{ Form::bsText('text', $todo->text) }}
        {{ Form::bsTextArea('body', $todo->body) }}
        {{ Form::bsText('due', $todo->due) }}
        {{ Form::bsSubmit('Update', ['class' => 'btn btn-success btn-lg']) }}

    {!! Form::close() !!}
@endsection
