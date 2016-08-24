<span >
	{!! Form::open(['method' => 'DELETE', 'route' => [$route, $id]]) !!}
		{!! Form::submit('&times;', ['onclick' => 'confirm("Siguran?")']) !!}
	{!! Form::close() !!}
</span>