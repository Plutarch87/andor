@extends ('layouts.app')
@section('content')
<section class="subcats">
	
	@foreach($subcats as $subcat)
	<div>
		<p>Name: {{$subcat->name}}</p>
	</div>

	@endforeach
		@foreach($items as $item)
	<div>
		<p>Name: {{$item->name}} {{ $item->category_id }}</p>
	</div>
	@endforeach
</section>
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
	        <input type="hidden" value="{{ $category_id  }}" name="category_id"></input>
	        <input type="hidden" value="{{ $subcat_id  }}" name="subcat_id"></input>
	        <input type="hidden" value="{{ csrf_token() }}" name="_token"></input>
	        <hr>

		    <div class="modal-footer">
		        <input type="submit" name="submit" value="Unesi"></input>
		    
		    </div>
	    </form>
	</div>
@endsection