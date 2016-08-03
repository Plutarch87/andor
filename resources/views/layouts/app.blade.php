<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<!-- <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'type='text/css'> -->
<script type="text/javascript" src="{{ url(asset('assets/jquery-1.12.0.min.js')) }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhu-orOCU7_qwFx5zr-M4nnGbWrue0PJI" type="text/javascript"></script>
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{ url(asset('assets/angular.js')) }}"></script>
<script type="text/javascript" src="{{ url(asset('assets/index.js')) }}"></script>
<script type="text/javascript" src="{{ url(asset('assets/bootstrap.js')) }}"></script>
<!-- angular -->
<script type="text/javascript" src="{{ url(asset('assets/app/app.js')) }}"></script>
<link rel="stylesheet" type="text/css" href="{{ url(asset('assets/bootstrap.css')) }}">
<link rel="stylesheet" type="text/css" href="{{ url(asset('css_flyoutverticalmenu.css')) }}">
<link rel="stylesheet" type="text/css" href="{{ url(asset('assets/index.css')) }}">
	<title>Hexor - @yield('title')</title>
</head>
<body ng-app="app" ng-controller="mainController">
<div class="main">        
<section>       
				<header>
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

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" ng-click="openKontaktModal();">
								<ul class="nav navbar-nav">                    
										<!-- <li><a href="#"><img src="assets/images/hd.png" id="logo"><span class="sr-only"> (current)</span></a></li> -->
										<li><button id="kontaktM">Kontakt</button></li> 
										<form class="navbar-form navbar-right" role="search">
										<div class="form-group">
												<input type="text" class="form-control" placeholder="Search">
												
										</div>
										<button type="submit" class="btn btn-default" id="search">Submit</button>
										</form>
								</ul>

										
						</div>
						</div>
						</nav>            
						<div class="ncontent">
								<h1 id="wlch1">Welcome to Hexor</h1>
								<a class="logo-wrapper" href="{{ url(asset('/')) }}"><img src="{{ url(asset("assets/images/hd.png")) }}" id="logo"></a>
								<ul class="nlistwrapper">
										<a class="nlinew"href="#"><li>Novo</li></a>
									<a class="nlibestseller"href="#"><li>Najprodavanije</li></a>    
									<a class="nlisale"href="#"><li>Akcija</li></a>
									@if(Auth::check())
									<a class= "nlibestseller" href="{{ url('/inactive') }}"><li>Neaktivne</li></a>
									@endif
								</ul>
								<div class="shopingwrapper">
										<span id="shopcircle"><% carts.length %></span>
										<a href="#" ng-click="openBasket();"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
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

@yield('content')

<!-- Dodaj predmet -->
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
                <input type="hidden"  name="id"  />
            <div class="modal-footer">
                <input type="submit" name="submit" value="Unesi"></input>
                </form>
            </div>

        </div>
    </div>  
</div>
            
           

<!-- Cart modal -->
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
        
        <!-- Podaci modal   -->
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
                <button ng-click="promeniModal()" id="narucibtn" ng-if="carts.length > 0">Naruči</button>
                
            </div>
            
        </div>

</div>
</div>

<!-- Kontakt modal -->
<div id="kontakt" class="modal">
 <div class="modal-content">
    <div class="modal-body">
        
    <a href="#closee" title="Closee" class="closee">X</a>
        <div id="map">
            <script type="text/javascript">
                var mapCanvas = document.getElementById("map"); 
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
</div>



</body>

</html>
