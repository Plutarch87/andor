@extends('layouts.app')

@section('content')
<section style="background-image: url('assets/images/purple-curtains-6.jpg');background-color: #F7BEF1;" >
<div class="container">
    <div class="left-content">
<div id="menuwrapper">
    <ul>
    @if (count($categories) > 0)
        @foreach ($categories as $category)
            <li>
                <a href="#main/{{ $category->id }}">{{ $category->name }}</a>                
                    <span >
                    <form action="{{ url('category/'.$category->id) }}" method="POST" id="delete" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" id="delete-category-{{ $category->id }}" style="float:right; margin-top:4%; margin-right:10%;" id="delete">&times;</button>
                    </form>
                    </span>
            </li>
        @endforeach
    @endif
    
        @if(Auth::check())
            <li>
                <form action="{{ url('category') }}" method="POST" id="create">
                {{ csrf_field() }}
                <input style="width:95%" type="text" name="name" id="create">
            </li>
            <li>
                

                    <a href="#" onclick="document.forms['create'].submit();return false;">+ Dodaj</a>
                </form>
            </li>
            <li>
                <form action="{{ url('category') }}" method="POST" id="createE">
                {{ csrf_field() }}
                <input style="width:95%" type="text" name="name" id="create">
            </li>
            <li>
                

                    <input type="submit" name="sumbit" value="sub">

                </form>
            </li>
        @endif
    </ul>
</div>
</div>
    <div class="main-content" id="main">
        <table>
            <tbody>
    @if(Auth::check())
    <button type="button" href="#main" class="btn btn-info">+ Dodaj predmet</button>
    @endif
                @if (count($items) > 0)
                    @foreach ($items as $item)
                <tr>
                    <td id="page">
                        <h3>{{ $item->name }}</h3>
                        <img src="assets/images/lubrikanti/v427.jpg" id="Slubrikant">
                        <h5>{{ $item->price}}</h5>
                        @if(Auth::check())
                            <button type="button" class="btn btn-info">Izmeni</button>
                            <form action="{{ url('item/'.$item->category_id) }}" method="POST" id="delete">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" id="delete-item-{{ $item->category_id }}" class="btn btn-danger">Izbrisi</button>
                            </form>
                        @else
                            <button type="button" class="btn btn-danger">{{ $item->sifra }}</button>
                            <button type="button" class="btn btn-success" id="myBtn">Detalji</button>
                        @endif
                    </td>
                </tr>
                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close">
                                    &times;
                                </span>
                                <div class="container">
                                <p>
                                    {{ $item->description }}
                                </p>
                                <img src="assets/images/modal/v427.jpg" class="modalImg">
                                </div>
                            </div>  
                        </div>
                        @endforeach
                        @endif
            </tbody>
        </table>
    </div>
</div>
</section>
   
@endsection