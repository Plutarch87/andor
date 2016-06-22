@extends('layouts.app')

@section('content')

<div class="col-sm-9 col-xs-7" id="main">
    <div class="main-content" id="elementtoScrollToID">
        <!-- Napravi novi predmet -->
            @if(Auth::check())
            	
            	<button type="button" id="myBtn" href="#main" class="btn btn-info">+ Dodaj predmet</button>
                
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

@endsection