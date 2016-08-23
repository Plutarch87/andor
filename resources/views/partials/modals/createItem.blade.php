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