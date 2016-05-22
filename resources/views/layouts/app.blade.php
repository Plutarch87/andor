<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
<meta http-equiv="Content-Type" content="text/html charset=utf-8 ">
<script type="text/javascript" src="assets/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="assets/index.js"></script>
<script type="text/javascript" src="assets/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css_flyoutverticalmenu.css">
<link rel="stylesheet" type="text/css" href="assets/index.css">

</head>
<body>
<div class="main">        
<section>       
        <header>
            <div class="nav-menu">
            <nav class="nav">
                    <ul id="menu">
                        <li><a href="index3.html"><img src="assets/images/hd.png" id="logo"></a></li>
                        <li><a href="formz">Naručite</a></li>
                        <li><a href="#">Kontakt</a></li>                  
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Pretraga</button>
                        </form>
                    </ul>


            </nav>
            </div>

<div id="theCarousel" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#theCarousel" data-slide-to="1"></li>
    <li data-target="#theCarousel" data-slide-to="2"></li>
  </ol>


  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="assets/images/carousel/triple_x_1.jpg" alt="a">
    </div>

    <div class="item">
      <img src="assets/images/carousel/afp-photo_1376375469901-1-HD.jpg" alt="a">
    </div>

    <div class="item">
      <img src="assets/images/carousel/160310-sex-pop-up.png" alt="a">
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

<div id="welcome">
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;Welcome to </h1>
    <img src="assets/images/hd.png">
</div>
<button type="button" class="btn btn-primary" id="button">Online Shop</button>

        </header>




</section>

@yield('content')       

</body>

</html>