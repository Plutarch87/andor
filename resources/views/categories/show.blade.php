@extends('layouts.app')

@section('sidebar')
	@parent
@show

@section('content')	

<h4>{{ $category->name }}</h4>

<h5>{{ $items->links() }}</h5>

@foreach($items as $item)
	<div class="col-md-3 col-sm-3">
        <div class="shopdiv">
            <h4>{{ $item->name }}</h4>
            {!! Html::image('storage/andor/'.$item->img, $item->name) !!}
                <div class="price-tag">
                    <span>
                        <h4>{{ $item->price }}</h4>
                    </span>
                    <button class="btn btn-success myShoppingCart">Dodaj u korpu</button>
                </div>
            @if(Auth::check())
                <button type="button" data-toggle="modal" data-target="#item-modal{{ $item->id }}" class="btn btn-success">Detalji</button>
                
                @include('partials.modals.item')
            @else
                @include('partials.deleteForm', ['route' => 'items.destroy', 'id' => $item->id])
                <a href="{!! route('items.edit', $item->id) !!}">Izmeni</a>
            @endif
            <button type="button" class="btn btn-danger">{{ $item->sifra }}</button>
        </div>
    </div>
@endforeach


@endsection