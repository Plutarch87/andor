<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<!-- MAPA -->
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhu-orOCU7_qwFx5zr-M4nnGbWrue0PJI" type="text/javascript"></script> -->
<!-- Styles -->
{!! Html::style('assets/bootstrap.css') !!}
{!! Html::style('https://fonts.googleapis.com/css?family=Lobster') !!}
{!! Html::style('assets/index.css') !!}
{!! Html::style('assets/css_flyoutverticalmenu.css') !!}
@stack('styles')
<!-- SCRIPTS -->
{!! Html::script('assets/jquery-1.12.0.min.js') !!}
{!! Html::script('assets/bootstrap.js') !!}
@stack('scripts')
	<title>Hexor - @yield('title')</title>
</head>
<body ng-app="app" ng-controller="mainController">
<div class="main">        
<section>       
	<header>    
<!-- NAVBAR -->
        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    			<ul class="nav navbar-nav">                    
    				<li>
                        <a data-toggle="modal" href="#kontaktModal">Kontakt</a>
                        
                    </li>
                    {!! Form::open(['class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Search', ['class' => 'btn btn-default form-control', 'placeholder' => 'Search']) !!}
                        </div>
                    {!! Form::close() !!}
    			</ul>						
    		</div>
	    </div>
        </nav>            
		<div class="ncontent">
			<h1 id="wlch1">Welcome to Hexor</h1>
			<a class="logo-wrapper" href="{{ url(asset('/')) }}">
                {!! Html::image('assets/images/hd.png', null, ['id' => 'logo']) !!}
            </a>
			<ul class="nlistwrapper">
				<a class="nlinew"href="#"><li>Novo</li></a>
				<a class="nlibestseller"href="{!! url('ponude/popular') !!}"><li>Najprodavanije</li></a>    
				<a class="nlisale"href="{!! url('ponude/akcija') !!}"><li>Akcija</li></a>
				@if(Auth::check())
				<a class= "nlibestseller" href="{{ route('inactive') }}"><li>Neaktivne</li></a>
				@endif
			</ul>
			<div class="shopingwrapper">
				<span id="shopcircle" class="badge">2</span>
				<a data-toggle="modal" href="#myCartModal"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
                @include('partials.modals.cart')
			</div>
		</div>
</div>

<!--<div class="carousel-wrapper">

<div id="theCarousel" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#theCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#theCarousel" data-slide-to="1"></li>
		<li data-target="#theCarousel" data-slide-to="2"></li>
	</ul>


	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="{{ url(asset("assets/images/carousel/triple_x_1.jpg")) }}" alt="a">
		</div>

		<div class="item">
			<img src="{{ url(asset("assets/images/carousel/afp-photo_1376375469901-1-HD.jpg")) }}" alt="a">
		</div>

		<div class="item">
			<img src="{{ url(asset("assets/images/carousel/160310-sex-pop-up.png")) }}" alt="a">
		</div>

	</div>

	<a class="left carousel-control" href="#theCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#theCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
</div>-->

	</header>
</section>

@section('sidebar')
<section style="background-color: #EDD9F6;" id="section2">
    <div class="row">
        <div class="col-sm-3 col-xs-5" id="menuwrapper">
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                        <ul>
                            @if(Auth::check())
                                <li>
                                    {!! Form::open(['route' => ['categories.subcats.store', $category->id]]) !!}
                                    {!! Form::text('name') !!}
                                </li>
                                <li>
                                    {!! Form::submit('Dodaj Potkategoriju') !!}
                                    {!! Form::close() !!}
                                </li>
                            @endif                      
                         
                            @foreach($category->subcats as $subcat)
                                <li> 
                                    <a href="{{ route('categories.subcats.show', array($category->id, $subcat->id)) }}">{{ $subcat->name }}</a>
                                {{-- DELETE SUBCATEGORY --}}
                                    @if(Auth::check())
                                        <span >
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['subcats.destroy', $subcat->id]]) !!}
                                                {!! Form::submit('&times;', ['onclick' => 'confirm("Siguran?")']) !!}
                                            {!! Form::close() !!}
                                        </span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    {{-- DELETE CATEGORY --}}
                        @if(Auth::check())
                            @include('partials.forms.delete', ['route' => 'categories.destroy', 'id' => $category->id])                                  
                        @endif
                    </li>
                @endforeach
            
            @if(Auth::check())
                <li>
                    {!! Form::open(['route' => ['categories.store', $category->id]]) !!}
                    {!! Form::text('name') !!}
                </li>
                <li>
                    {!! Form::submit('Dodaj Kategoriju') !!}
                    {!! Form::close() !!}
                </li>                
            @endif
            </ul>
        </div>

@show

        <div class="col-sm-9 col-xs-7">
            <div class="main-content">
            <div class="container-fluid">
                
            @yield('content')           
           
           </div>
           </div>
       </div>

    </div>
</section>
@include('partials.modals.contact')
</body>

</html>
