@extends('layouts.app')

@section('title', 'Izmeni predmet')

@section('content')
<div class="container-fluid">
	{{ Form::model($item, ['method' => 'PATCH', 'route' => ['item.update', $item]], ['class' => 'form-horizontal', 'role' => 'form', 'files' => true]) }}
		@include('partials.editForm')
    {{ Form::close() }}
    	<img src="{{ asset('storage/andor/'.$item->img) }}" height="250px" width="auto" alt="{{ $item->name }}">
</div>
@endsection