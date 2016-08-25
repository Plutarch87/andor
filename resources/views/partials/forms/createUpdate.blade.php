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
<div class="form-group"></div>
	<div>
		{{ Form::label('akcija', 'Akcija') }}
		{{ Form::checkbox('akcija') }}

		{{ Form::label('popularno', 'Najprodavanije') }}
		{{ Form::checkbox('popularno') }}
	</div>
<hr>
{{ Form::hidden('category_id', $category->id) }}
@if(isset($subcat->id))
	{{ Form::hidden('subcat_id', $subcat->id) }}
@endif
<div class="form-group">
	{{ Form::label('img', 'Izaberi sliku:') }}
	{{ Form::file('img') }}
</div>
	
<hr>
	{{ Form::submit($submitButton) }}
