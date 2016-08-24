@extends('layouts.app')

@section('title', 'Dobro dosli u Hexor')

@section('sidebar')
    @parent
@show

@section('content')

<h5>{{ $items->links() }}</h5>

@foreach($items as $item)
    <div class="col-md-3 col-sm-3">
        <div class="shopdiv">
            <h4>{{ $item->name }}</h4>
            <a data-toggle="modal" href="#item-modal{{ $item->id }}">{!! Html::image('storage/andor/'.$item->img, $item->name) !!}</a>
                <div class="price-tag">
                    <span>
                        <h4>{{ $item->price }}</h4>
                    </span>
                    <button class="btn btn-success myShoppingCart">Dodaj u korpu</button>
                </div>
            @if(Auth::check())
                @include('partials.forms.delete', ['route' => 'items.destroy', 'id' => $item->id])
                <a href="{!! route('items.edit', $item->id) !!}">Izmeni</a>
            @endif
            <button type="button" class="btn btn-danger">{{ $item->sifra }}</button>
        @include('partials.modals.item')
        </div>
    </div>    
    
@endforeach

{{ $items->links() }}

@endsection