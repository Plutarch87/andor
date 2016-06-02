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
            <form action="{{ url('upload') }}" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Upload image</legend>
                        <p>Image upload</p>
                        <ol>
                            <li>
                                <label>Upload:</label>
                                <input type="file" name="file" id="file"></input>
                                <input type="submit" name="submit" value="Upload"></input>
                                <input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
                            </li>
                        </ol>
                </fieldset>
            </form>
                
        </div>
        </header>
</section>
</div>
</body>
</html>