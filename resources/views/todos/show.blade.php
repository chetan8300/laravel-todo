@extends('main')

@section('content')
	<a class="btn btn-primary" href="/">Go Back</a>

	<h3>
		{{ $todo->text }}
	</h3>	
	
	<div class="label label-danger">{{ $todo->due }}</div>
	
	<hr>

	<p>{{ $todo->body }}</p>
	<br><br>
	<div class="row">
		<div class="col-md-2">
			<a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-default btn-block">Edit</a>
		</div>
		<div class="col-md-2">
			{!! Form::open(['route' => ['todo.destroy', $todo->id], 'method' => 'DELETE']) !!}
				{{ Form::bsSubmit('Delete	', ['class' => 'btn btn-danger btn-block']) }}
			{!! Form::close() !!}
		</div>
	</div>
	
@endsection

