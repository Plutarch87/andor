@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table>

                        <tr>
                            <td>
                            <h3>Categories</h1>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="{{'#'.$category->id }}">{{ $category->id }}</a></li>
                                @endforeach
                            </ul>
                            </td>                         
                        
                            <td>
                            <h3>Items</h3>
                            <ul>
                                @foreach($items as $item)                                
                                    <li><?php  echo $item->category_id ; ?></li>
                                @endforeach
                            </ul>
                            </td>    
                        </tr>

                        <tr>
                            <td>
                            <h3><strong>SELECTED CATEGORY</strong></h3>
                                <div class="main-content" id=main>
                                    <p>&nbsp;</p>
                                    <p>Your selected category is: 
                                    
                                    </p>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection