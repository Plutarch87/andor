<!-- Cart modal -->
<div id="myCartModal">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
            &times;
        </button>        
    </div>
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
