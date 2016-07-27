@extends('layouts.app')

@section('content')

 <div class="container-fluid">
{{ $items->links() }}

              <div class="row">

@if(count($items)>0)

@foreach($items as $item)
<div class="col-md-3 col-xs-6">

<div class="shopdiv">
{!! $item->name !!}
<div>
 <img src="storage/andor/{!! $item->img !!}" alt="{!! $item->img !!}" >
</div>
<form action="{!! url('inactive', $id = $item->id) !!}">

<input type="submit" value="Aktiviraj">
</form>

</div>
</div>
@endforeach
@endif


</div>
</div>
{{ $items->links() }}

@endsection
