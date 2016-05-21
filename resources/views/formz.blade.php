<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<script type="text/javascript" src="assets/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="assets/formz.js"></script>
<script type="text/javascript" src="assets/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/formz.css">



</head>
<body>
<div class="main">
       
  <section>
        <header>
            <div class="nav-menu">
            <nav class="nav">
                    <ul id="menu">
                        <li><a href="index4.html"><img src="assets/images/hd.png" id="logo"></a></li>
                        <li><a href="formz.html">Naručite</a></li>
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

            <div id="formdiv">
            <form action="/cgi-bin/mailinglist.pl" method="post">
                <fieldset>
                    <legend>bla b la ba laaa</legend>
                        <p>blablabla</p>
                        <ol>
                            <li><label for="name">Ime i prezime</label>
                            <input type="text" name="name" id="name"></li><br><br>
                            <li><label for="name">Adresa</label>
                            <input type="text" name="name" id="adress"></li><br><br>                            
                            <li><label for="name">Mesto</label>
                            <input type="text" name="name" id="place"></li><br><br>
                            <li><label for="name">Poštanski broj</label>
                            <input type="text" name="name" id="postalcode"></li><br><br>                            
                            <li><label for="name">Poruka</label>
                            <textarea rows="4" cols="21"></textarea></li><br><br>
                            <li><label for="name">Telefon</label>
                            <input type="text" name="name" id="phone"></li><br><br>
                            <li><label for="name">Email</label>
                            <input type="text" name="email" id="email"></li><br><br>
                            <input type="submit" value="Submit">
                        </ol>
                </fieldset>
            </form>
                
        </div>
        </header>
</section>
</div>
</body>
</html>