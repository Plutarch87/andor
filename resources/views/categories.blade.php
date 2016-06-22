@extends('layouts.app')

@section('content')

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

            <div class="container-fluid">
                                <div class="col-md-3 col-sm-3" ng-repeat="item in items | orderBy:item.category_id">
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
@endsection