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
            @if($item->akcija)
                <div class="price-tag">
                    <span>
                        <h4>{{ $item->price }}</h4>
                    </span>
                </div>
            @endif
            <a data-toggle="modal" href="#item-modal{{ $item->id }}">{!! Html::image('storage/andor/'.$item->img, $item->name) !!}</a>
                @include('partials.modals.item')            
            @if(Auth::check())                
                @include('partials.forms.delete', ['route' => 'items.destroy', 'id' => $item->id])
            @else
                <button class="btn btn-success myShoppingCart">Dodaj u korpu</button>
            @endif
            @if($item->popularno)
                <button type="button" class="btn btn-danger">{{ $item->sifra }}</button>
            @endif
        </div>
    </div>    
    
@endforeach

{{ $items->links() }}

@endsection