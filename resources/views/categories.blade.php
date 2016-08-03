@extends('layouts.app')

@section('title', 'Kategorije')

@section('content')

@section('sidebar')
<section style="background-color: #EDD9F6;" id="section3">
    <div class="row">
        <div class="col-sm-3 col-xs-5" id="menuwrapper">
            <ul>
            @if (count($categories) > 0)
                @foreach ($categories as $category)
                    <li>
                        @if(Auth::check())             
                            <span >
                                <button type="button" data-toggle="modal" data-target="#myModal{{$category->id}}" href="#main" class="btn btn-info" style="float:right; height:90%;">&plus;</button>
                            </span>
                            <!-- Modal -->
                            <div id="myModal{{$category->id}}" class="modal">
                            <div class="container">
                                <div class="modal-content">
                                    <div class="modal-header">                                        
                                        <span class="close">&times;</span>
                                        <h4 class="modal-title">Napravi novi predmet</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('item') }}" method="POST" enctype="multipart/form-data" id="newItem">
                                            <label for="name">Ime:</label>
                                            <input type="text" name="name"  id="newItem"  ></input>
                                            <label for="sifra">Sifra:</label>
                                            <input type="text" name="sifra"  id="newItem"  ></input>
                                            <label for="price">Cena:</label>
                                            <input type="text" name="price"  id="newItem"  ></input>
                                            <label for="name">Opis:</label>
                                            <textarea rows="4" cols="18"></textarea>
                                            <br />
                                            <label for="akcija">Akcija</label>
                                            <input type="checkbox" name="akcija"></input>
                                            <br />
                                            <label for="popularno">Najprodavanije</label>
                                            <input type="checkbox" name="popularno"></input>
                                            <hr>
                                            <label>Izaberi sliku:</label>
                                            <input type="file" name="file" id="newItem"></input>
                                            <input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
                                            <input type="hidden" value="{{ $category->id  }}" name="category_id"></input>
                                            <hr>
                                        <div class="modal-footer">
                                            <input type="submit" name="submit" value="Unesi"></input>
                                            </form>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            </div>
                        @endif
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
                                                
						@if(Auth::check())
                                                <span >
                                                    <button data-toggle="modal" type="button" class="btn btn-info" data-target="#myModal{{$category->id}}" style="float:left; width:15%" >&plus;</button>
                                                </span>
						<!-- Modal -->
                                                <div id="myModal{{$category->id}}" class="modal" style="z-index:123908; position:fixed">
						  <div class="container">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <span class="close">&times;</span>
                                                            <h4 class="modal-title">Napravi novi predmet</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('item') }}" method="POST" enctype="multipart/form-data" id="newItem">
                                                                <label for="name">Ime:</label>
                                                                <input type="text" name="name"  id="newItem"  ></input>
                                                                <label for="sifra">Sifra:</label>
                                                                <input type="text" name="sifra"  id="newItem"  ></input>
                                                                <label for="price">Cena:</label>
                                                                <input type="text" name="price"  id="newItem"  ></input>
                                                                <label for="name">Opis:</label>
                                                                <textarea rows="4" cols="18"></textarea>
                                                                <br />
                                                                <label for="akcija">Akcija</label>
                                                                <input type="checkbox" name="akcija"></input>
                                                                <br />
                                                                <label for="popularno">Najprodavanije</label>
                                                                <input type="checkbox" name="popularno"></input>
                                                                <hr>
                                                                <label>Izaberi sliku:</label>
                                                                <input type="file" name="file" id="newItem"></input>
                                                                <input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
                                                                <input type="hidden" value="{{ $category->id  }}" name="category_id"></input>
                                                                <input type="hidden" value="{{ $subcat->id  }}" name="subcat_id"></input>
                                                                <hr>
                                                            <div class="modal-footer">
                                                                <input type="submit" name="submit" value="Unesi"></input>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
						  </div>
                                                </div>
						                      @endif
                                              <a href="{{ url('categories', $category_id = $category->id) }}/{{ 'subcats/'. $subcat->id }}#main">{{ $subcat->name }}</a>
                                            </li>        
                                        @endif
                                    @endforeach
                                @endif 
                             
                        </ul>
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
                    <div class="row">
                        
                    <div class="col-md-3 col-sm-3"  ng-repeat="item in categories.items|orderBy:'-created_at'" 
                    ng-if="item.category_id == <?php foreach ($categories as $category) {
                        foreach ($items as $item) {
                        if($category->id == $item->category_id )
                            { echo ($category->id); break; }}} ?>">
                        <div class="shopdiv" >
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

</div>
</section>
@show

@endsection
