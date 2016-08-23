@extends('layouts.app')

@section('title', 'Dobro dosli u Hexor')

@section('sidebar')
    @parent
@stop

@section('content')
        <div class="col-sm-9 col-xs-7">
            <div class="main-content">


            <div class="container-fluid">
                <div class="col-md-3 col-sm-3" ng-repeat="item in items.items">


                    <div class="shopdiv">
                        <h4><% item.name %></h4>
                        <img src="storage/andor/<% item.img %>" alt="<% item.name %>" >
                            <div class="price-tag">
                                <span>
                                    <h4><% item.price %></h4>
                                </span>
                                <button class="btn btn-success myShoppingCart" 
                                ng-click="addItem(item.price, item.name)"></button>
                            </div>
                        <button type="button" class="btn btn-danger"><% item.sifra %></button>
                        <button type="button" data-toggle="modal" data-target="#item-modal<% item.id %>" ng-click="openItemModal(item);" class="btn btn-success">Detalji</button>

                    </div>
                </div>
            </div>
            </div>
        </div>


    </div>
    <!-- Item modal -->
    <div id="item-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" ng-click="closeItemModal()">&times;</span>
                <h4 class="modal-title"><% item.name %></h4>
            </div>
            <div class="modal-body">
                <p><% item.description %></p>
                <img src="storage/andor/<% item.img %>" class="modalImg">
            </div>
        </div>  
    </div>

</section>


@endsection