<div class="form-group">
	{{ Form::label('name', 'Naziv:') }}	
	{{ Form::text('name', old('name'), ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('sifra', 'Sifra:')}}
	{{ Form::text('sifra', old('sifra'), ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('price', 'Cena:')}}
	{{ Form::text('price', old('price'), ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('name', 'Opis:') }}
	{{ Form::textarea('description', old('description'), ['cols' => 20, 'rows' => 4, 'class' => 'form-control']) }}
</div>
<div>
	{{ Form::label('akcija', 'Akcija') }}
</div>
<div>
	{{ Form::checkbox('akcija') }}
</div>
<div>
	{{ Form::label('popularno', 'Najprodavanije') }}
</div>
<div>
	{{ Form::checkbox('popularno') }}
</div>
<hr>
<div class="form-group">
	{{ Form::label('name', 'Izaberi sliku:') }}
	{{ Form::file('img', ['id' => 'newItem']) }}
</div>
	
<hr>
	{{ Form::submit('Unesi') }}