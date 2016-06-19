@extends('layouts.app')

@section('content')
<section style="background-color: #EDD9F6;" id="section2">
<div class="row">
<div class="col-sm-3 col-xs-5" id="menuwrapper">
    <ul>
    @if (count($categories) > 0)
        @foreach ($categories as $category)
            <li>
                <a href="{{ action("ItemController@show", ['id' => $category->id]) }}#main">{{ $category->name }}</a>
                <span class="flatline"></span>

                <ul>
                    @if(count($subcats) > 0)
                    @if(Auth::check())
                        
                        
                           <li>
                               <form action="{{ url('subcat') }}" method="POST" id="create">
                                   {{ csrf_field() }}
                                   
                                   
                                   <input style="width:95%; margin: 4% 10% 0 2%;" type="text" name="name" id="create">
                           </li>
                           <li>
                                   <input style="margin-top: 4%; margin-right: 10%;" type="submit" name="submit" value="+ Dodaj potkategoriju">
                               </form>
                           </li>
                    @endif  

                      @foreach($subcats as $subcat)
                       @if($category->id == $subcat->category_id)
                      
                           <li> 
                                <a href="{{ url('categories') }}{{ $id = $subcat->id }}Cat#main">{{ $subcat->name }}</a>

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
    
    <!-- Dodaj kategoriju -->
        @if(Auth::check())
           
            </li>
            <li>
                <form action="{{ url('category') }}" method="POST" id="createE">
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
        {{ $items->links() }}

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
                                <input type="hidden" value="{{" name="id"  />
                            <div class="modal-footer">
                                <input type="submit" name="submit" value="Unesi"></input>
                                </form>
                            </div>
                            
                            <div style="float:right">
                            <label for="repeatSelect"> Repeat select: </label>
                                <select name="repeatSelect" id="repeatSelect" ng-model="data.repeatSelect">
                                  <option ng-repeat="option in data.availableOptions" value="{{option.id}}">{{option.name}}</option>
                                </select>
                              </form>
                              <hr>
                              <tt>repeatSelect = {{data.repeatSelect}}</tt><br/>
                            </div>    

                        </div>
                    </div>  
                </div>

                <select>
                    <option></option>
                </select>
            @endif
            <div class="container-fluid">
                    <div class="col-md-3 col-sm-3" ng-repeat="item in items | orderBy:item.price">
                    <div class="shopdiv">
                        <h4><% item.name %></h4>
                            <img src="{{ asset('/storage') }}<% item.img %>" alt="<% item.name %>" >
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
            {!! $items->links() !!}
    </div>
</div>

<div id="myCartModal">
    <div class="modal-content2">
        <span id="close2">
            &times;
        </span>
        <div class="korpawrapper">
        <p class="Korpa">
            <h1>Korpa</h1>
        </p>
        </div>
        <ul class="lista-korpe" ng-if="promeni == 0">
            <li class="korpa-predmet" ng-repeat="cart in carts">
                <div class="predmet-info">
                    <% cart.name %>
                </div>
                <button ng-click="deleteItem($index, cart.price)">&times;</button>
                <div class="kolicina-info">
                Količina: 1
                </div>
                <div class="cena-info">
                    <span class="cena">
                        <% cart.price %>
                    </span>
                    
                </div>
                
            </li>                 
        </ul>
        <div ng-if="promeni == 1">
            
        <div>
            <label for="name">Ime i prezime</label>
            <input type="text" ng-model="formData.fullName">
            
        </div>
            
            <div>
                <label for="name">Adresa</label>
                <input type="text" ng-model="formData.buyerInfo">
            </div>                             
            
            <div>
            <label for="name">Mesto</label>
            <input type="text" name="name" id="place">
            </div>

            <div>
            <label for="name">Poštanski broj</label>
            <input type="text" name="name" id="postalcode">
            </div>

            <div>
            <label for="name">Telefon</label>
            <input type="text" name="name" id="phone">
            </div>
            <input type="submit" value="Naručite" id="submitbtn" ng-click="naruci()">
        </div>
        <div class="korpa-footer">
            <div class="korpa-total">
                <span>
                    Ukupno: <% price %>.00
                </span>
                <span class="ukupno">
                    
                </span>
                <button ng-click="promeniModal()" id="narucibtn" ng-if="promeni == 0">Naruči</button>
                
            </div>
            
        </div>

</div>

<div id="openModal" class="modalDialog">
 <div>
    <a href="#closee" title="Closee" class="closee">X</a>
    <div id="map">
        <script>
            var mapCanvas = document.getElementById("map");
            var mapOptions = {
            center: new google.maps.LatLng(45.252481, 19.838341), zoom: 20}
            var map = new google.maps.Map(mapCanvas, mapOptions);
        </script>
    </div>
    <span id="kmodal-info" style="display:block; position:absolute; top:-4%; right:1%;">
        <h3>Adresa:</h3>
        <p>Novi Sad, Jevrejska 23 pasaž.</p>
        <h3>Telefon:</h3>
        <p>021 / 661 - 9056; 063 / 536 - 488</p>
        <h3>Radno vreme:</h3>
        <p>10h - 21h; Od ponedeljka do subote.</p>
        <p>hexor@sezampro.rs</p>
    </span>
    </div>
</div>

</section>
   
@endsection