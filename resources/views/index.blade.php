@extends('layouts.app')

@section('title', 'Dobro dosli u Hexor')

@section('content')

@section('sidebar')
<section id="section2">
    <div class="row">
        <div class="col-sm-3 col-xs-5" id="menuwrapper">
            <ul>
            @if (count($categories) > 0)
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ url('categories', $id = $category->id) }}#main">{{ $category->name }}</a>
                        <ul style="z-index:51; overflow:auto;">
                                            @if(Auth::check())
                                                    <li>
                                                            <form action="{{ url('subcat', $id = $category->id ) }}" method="POST" id="create">
                                                            {{ csrf_field() }}

                                                            <input style="width:95%; margin: 4% 10% 0 2%;" type="text" name="name" id="create">
                                                    </li>
                                                    <li>
                                                            <input style="margin-top: 4%; margin-right: 10%;" type="submit" name="submit" value="+ Dodaj potkategoriju">
                                                            </form>
                                                    </li>
                                            @endif                      
                                         
                                            @if(count($subcats) > 0)
                                                    @foreach($subcats as $subcat)
                                                            @if($category->id == $subcat->category_id)
                                                                    <li> 
                                                                            <a href="{{ url('subcats', $category_id = $category->id) }}/{{ $id = $subcat->id}}#main">{{ $subcat->name }}</a>

                                                                            <span >
                                                                            <form action="{{ url('subcat', $subcat->id) }}" method="POST" id="delete" style="display:inline">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button type="submit" id="delete-subcat-{{ $subcat->id }}" style="float:left; margin-top:4%; margin-right:10%;" id="delete">&times;</button>
                                                                            </form>
                                                                            </span>
                                                                    </li>        
                                                            @endif
                                                    @endforeach
                                            @endif 
                                            </ul>
                                                         
                                            @if(Auth::check())             
                                                    <span >
                                                    <form action="{{ url('category', $category->id) }}" method="POST" id="delete" style="display:inline">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" id="delete-category-{{ $category->id }}" style="float:right; margin-top:4%; margin-right:10%;" id="delete">&times;</button>
                                                    </form>
                                                    </span>
                                            @endif
                            </li>
                    @endforeach
            @endif
            
            @if(Auth::check())

                            </li>
                            <li>
                                    <form action="{{ url('category') }}" method="POST" id="create">
                                            {{ csrf_field() }}
                                    <input style="width:95%; margin: 4% 10% 0 2%" type="text" name="name" id="create">
                            </li>
                            <li>
                                    <input style="float: right; margin-top: 4%; margin-right: 10%;" type="submit" name="submit" value="+ Dodaj kategoriju">
                                    </form>
                            </li>
                    @endif
            </ul>
        </div>

        <div class="col-sm-9 col-xs-7">
            <div class="main-content">

            <div class="container-fluid">
                <div class="col-md-3 col-sm-3" ng-repeat="item in items | orderBy:'-created_at'">
                    <div class="shopdiv">
                        <h4><% item.name %></h4>
                        <img src="{{ asset('/storage/andor') }}/<% item.img %>" alt="<% item.name %>" >
                            <div class="price-tag">
                                <span>
                                    <h4><% item.price %></h4>
                                </span>
                                <button class="btn btn-success myShoppingCart" 
                                ng-click="addItem(item.price, item.name)"></button>
                            </div>
                        <button type="button" class="btn btn-danger"><% item.sifra %></button>
                        <button type="button"  class="btn btn-success">Detalji</button>
                    </div>
                </div>
            </div>
            </div>
        </div>


    </div>
</section>
@show

@endsection