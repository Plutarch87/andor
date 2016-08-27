@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-sm-6">
				<ul class="list-group">
					@foreach($items as $item)
						<li class="list-group-item">
							<span class="badge">{{ $item['qty'] }}</span>
							<strong>{{ $item['item']['name'] }}</strong>
							<span class="label label-success">{{ $item['price'] }}</span>
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Action<span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="#">Reduce by 1</a></li>
									<li><a href="#">Reduce All</a></li>
								</ul>
							</div>
						</li>
					@endforeach
				</ul>		
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<strong>Total: {{ $totalPrice }}</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<button type="button" class="btn btn-success">Naruci</button>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-sm-6">
				<h2>Nemate predmeta u korpi</h2>
			</div>
		</div>

	@endif
@endsection