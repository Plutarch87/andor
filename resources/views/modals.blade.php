@section('modals')

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
                <button ng-click="promeniModal()" id="narucibtn" ng-if="promeni == 0">Naruči</button>
                
            </div>
            
        </div>

</div>

<!-- Kontakt modal -->
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

@endsection