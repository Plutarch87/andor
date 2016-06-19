@extends('layouts.app')

@section('content')
<section style="background-color: #F0CCBF;" id="section2">
<div class="row">
<div class="col-sm-3 col-xs-5" id="menuwrapper">
    <ul>
    @if (count($categories) > 0)
        @foreach ($categories as $category)
                <li>

                    <a href="{{ url('categories') }}{{ $id = $category->id }}#main">{{ $category->name }}</a>    <ul>
                    @if(Auth::check())
                           <li>
                               <form action="{{ url('subcat') }}{{ $id = $category->id }}" method="POST" id="create">
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
                                <a href="{{ url('subcats') }}/{{ $id = $subcat->id }}/{{  $category_id = $category->id }}#main">{{ $subcat->name }}</a>

                                <span >
                                <form action="{{ url('subcat/'.$subcat->id) }}" method="POST" id="delete" style="display:inline">
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
                        <form action="{{ url('category/'.$category->id) }}" method="POST" id="delete" style="display:inline">
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
<div class="col-sm-9 col-xs-7" id="main">
    <div class="main-content" id="elementtoScrollToID">

        <!-- Napravi novi predmet -->
            @if(Auth::check())
                <button type="button" id="myBtn" href="#main" class="btn btn-info">+ Dodaj predmet</button>
                <div id="myModal" class="modal">
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
                                <hr>
                            <div class="modal-footer">
                                <input type="submit" name="submit" value="Unesi"></input>
                                </form>
                            </div>
                            
                                 

                        </div>
                    </div>  
                </div>
            @endif

        <div class="container-fluid" >
                        <div style="float:right">   
                        <label for="repeatSelect"> Sortiraj: </label>
                            <select name="repeatSelect" id="repeatSelect" ng-model="data.items">
                              <option ng-repeat="item in items | orderBy:item.price" >Jeftino</option>
                            </select>
                          <hr>
                        </div>  
            <div class="container-fluid">
                                <div class="col-md-3 col-sm-3" ng-repeat="item in items | orderBy:item.created_at">
                                <div class="shopdiv">
                                    <h4><% item.name %></h4>
                                        <img src="{{ asset('/storage') }}/<% item.img %>" alt="<% item.name %>" >
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
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close">&times;</span>
                                <h4 class="modal-title"><% item.name %></h4>
                            </div>
                            <div class="modal-body">
                                <p><% item.description %></p>
                                <img src="assets/images/modal/v427.jpg" class="modalImg">
                            </div>
                        </div>  
                    </div>
        </div>
    </div>
</div>
</section>
@endsection