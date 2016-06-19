<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<!-- <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'type='text/css'> -->
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="{{ url(asset('assets/jquery-1.12.0.min.js')) }}"></script>
<script type="text/javascript" src="{{ url(asset('assets/angular.js')) }}"></script>
<script type="text/javascript" src="{{ url(asset('assets/index.js')) }}"></script>
<script type="text/javascript" src="{{ url(asset('assets/bootstrap.js')) }}"></script>
<!-- angular -->
<script type="text/javascript" src="{{ url(asset('assets/app/app.js')) }}"></script>

<link rel="stylesheet" type="text/css" href="{{ url(asset('assets/bootstrap.css')) }}">
<link rel="stylesheet" type="text/css" href="{{ url(asset('css_flyoutverticalmenu.css')) }}">
<link rel="stylesheet" type="text/css" href="{{ url(asset('assets/index.css')) }}">

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

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">                    
                    <!-- <li><a href="#"><img src="assets/images/hd.png" id="logo"><span class="sr-only"> (current)</span></a></li> -->
                    <li><a href="#">Kontakt</a></li> 
                    <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                        
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </ul>

                    
            </div>
            </div>
            </nav>            
            <div class="ncontent">
                <h1 id="wlch1">Welcome to Hexor</h1>
                <a class="logo-wrapper" href="#"><img src="{{ url(asset("assets/images/hd.png")) }}" id="logo"></a>
                <ul class="nlistwrapper">
                    <a class="nlinew"href="#"><li>Novo</li></a>
                  <a class="nlibestseller"href="#"><li>Najprodavanije</li></a>    
                  <a class="nlisale"href="#"><li>Akcija</li></a>
                    
                </ul>
                <div class="shopingwrapper">
                    <span id="shopcircle"><% carts.length %></span>
                    <a href="#"id="myShopBtn"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
                </div>

            </div>
            </div>










<div class="carousel-wrapper">

<div id="theCarousel" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#theCarousel" data-slide-to="1"></li>
    <li data-target="#theCarousel" data-slide-to="2"></li>
  </ul>


  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="{{ url(asset("assets/images/carousel/choc-sex-01.jpg")) }}" alt="a">
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
</div>

        </header>
</section>

@yield('content')
</body>

</html>