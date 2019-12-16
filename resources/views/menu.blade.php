@extends('layouts.template')

@section('title','Menu')


@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="text-center">~MENU~</h1>
  </div>
</div>

<div class="menu-items">
    <h2  class="categ">F.R.I.E.N.D.S Special</h2>
    @foreach($food as $fi)
    @if($fi->category=='F.R.I.E.N.D.S Special')
    
    <form class="form-inline" method='POST' action="menu/{{$fi->id}}"
    onsubmit="return confirm('Confirm Order?')">
    @csrf
    @method('PUT')
    <input name="_method" type="hidden" value="put">
    <div class="ui item item-view container">
        <div class="content card-body">
            <div class="row">
                <div class="col-sm-1">
                    @if($fi->contents=='Veg')
                    <img src="https://img.icons8.com/color/48/000000/vegetarian-food-symbol.png" class="v-nv">
                    @else
                    <img src="https://img.icons8.com/color/48/000000/non-vegetarian-food-symbol.png" style="width:25px;height:25px;">
                    @endif               
                </div>
                <div class="col-sm-8">
                    <div class="food-name">
                    {{$fi->food_name}}
                    </div>
                    <div class="food-price">
                    ₹{{$fi->price}}
                    </div>
                    <div class="food-serves">
                        <span>Serves: {{$fi->serves}}</span>
                    </div>
                    <div class="food-description">
                        <span>{{$fi->description}}</span>
                    </div>
                </div>
                @if($fi->quantity>0)
                <div class="col-sm-3 float-right">
                    <input type="number" name="quantity" min="1" max="{{ $fi->quantity }}" value='1'>
                    <button class="btn btn-success btn-sm " type="submit">Order</button>
                </div>
                @else
                <div class="col-sm-3 float-right">
                Out Of Stock!!
                </div>
                @endif
            </div>
        </div>
    </div>
    </form>
    @endif
    @endforeach
</div>



<div class="menu-items">
    <h2  class="categ">Sides</h2>
    @foreach($food as $fi)
    @if($fi->category=='Sides')
    
    <form class="form-inline" method='POST' action="menu/{{$fi->id}}"
    onsubmit="return confirm('Confirm Order?')">
    @csrf
    @method('PUT')
    <input name="_method" type="hidden" value="put">
    <div class="ui item item-view container">
        <div class="content card-body">
            <div class="row">
                <div class="col-sm-1">
                    @if($fi->contents=='Veg')
                    <img src="https://img.icons8.com/color/48/000000/vegetarian-food-symbol.png" class="v-nv">
                    @else
                    <img src="https://img.icons8.com/color/48/000000/non-vegetarian-food-symbol.png" style="width:25px;height:25px;">
                    @endif               
                </div>
                <div class="col-sm-8">
                    <div class="food-name">
                    {{$fi->food_name}}
                    </div>
                    <div class="food-price">
                    ₹{{$fi->price}}
                    </div>
                    <div class="food-serves">
                        <span>Serves: {{$fi->serves}}</span>
                    </div>
                    <div class="food-description">
                        <span>{{$fi->description}}</span>
                    </div>
                </div>
                @if($fi->quantity>0)
                <div class="col-sm-3 float-right">
                    <input type="number" name="quantity" min="1" max="{{ $fi->quantity }}" value='1'>
                    <button class="btn btn-success " type="submit">Order</button>
                </div>
                @else
                <div class="col-sm-3 float-right">
                Out Of Stock!!
                </div>
                @endif
            </div>
        </div>
    </div>
    </form>
    @endif
    @endforeach
</div>


<div class="menu-items">
    <h2  class="categ">Pastas</h2>
    @foreach($food as $fi)
    @if($fi->category=='Pastas')
    
    <form class="form-inline" method='POST' action="menu/{{$fi->id}}"
    onsubmit="return confirm('Confirm Order?')">
    @csrf
    @method('PUT')
    <input name="_method" type="hidden" value="put">
    <div class="ui item item-view container">
        <div class="content card-body">
            <div class="row">
                <div class="col-sm-1">
                    @if($fi->contents=='Veg')
                    <img src="https://img.icons8.com/color/48/000000/vegetarian-food-symbol.png" class="v-nv">
                    @else
                    <img src="https://img.icons8.com/color/48/000000/non-vegetarian-food-symbol.png" style="width:25px;height:25px;">
                    @endif               
                </div>
                <div class="col-sm-8">
                    <div class="food-name">
                    {{$fi->food_name}}
                    </div>
                    <div class="food-price">
                    ₹{{$fi->price}}
                    </div>
                    <div class="food-serves">
                        <span>Serves: {{$fi->serves}}</span>
                    </div>
                    <div class="food-description">
                        <span>{{$fi->description}}</span>
                    </div>
                </div>
                @if($fi->quantity>0)
                <div class="col-sm-3 float-right">
                    <input type="number" name="quantity" min="1" max="{{ $fi->quantity }}" value='1'>
                    <button class="btn btn-success " type="submit">Order</button>
                </div>
                @else
                <div class="col-sm-3 float-right">
                Out Of Stock!!
                </div>
                @endif
            </div>
        </div>
    </div>
    </form>
    @endif
    @endforeach
</div>


<div class="menu-items">
    <h2  class="categ">Pizzas</h2>
    @foreach($food as $fi)
    @if($fi->category=='Pizzas')
    
    <form class="form-inline" method='POST' action="menu/{{$fi->id}}"
    onsubmit="return confirm('Confirm Order?')">
    @csrf
    @method('PUT')
    <input name="_method" type="hidden" value="put">
    <div class="ui item item-view container">
        <div class="content card-body">
            <div class="row">
                <div class="col-sm-1">
                    @if($fi->contents=='Veg')
                    <img src="https://img.icons8.com/color/48/000000/vegetarian-food-symbol.png" class="v-nv">
                    @else
                    <img src="https://img.icons8.com/color/48/000000/non-vegetarian-food-symbol.png" style="width:25px;height:25px;">
                    @endif               
                </div>
                <div class="col-sm-8">
                    <div class="food-name">
                    {{$fi->food_name}}
                    </div>
                    <div class="food-price">
                    ₹{{$fi->price}}
                    </div>
                    <div class="food-serves">
                        <span>Serves: {{$fi->serves}}</span>
                    </div>
                    <div class="food-description">
                        <span>{{$fi->description}}</span>
                    </div>
                </div>
                @if($fi->quantity>0)
                <div class="col-sm-3 float-right">
                    <input type="number" name="quantity" min="1" max="{{ $fi->quantity }}" value='1'>
                    <button class="btn btn-success " type="submit">Order</button>
                </div>
                @else
                <div class="col-sm-3 float-right">
                Out Of Stock!!
                </div>
                @endif
            </div>
        </div>
    </div>
    </form>
    @endif
    @endforeach
</div>


<div class="menu-items">
    <h2  class="categ">Shakes</h2>
    @foreach($food as $fi)
    @if($fi->category=='Shakes')
    
    <form class="form-inline" method='POST' action="menu/{{$fi->id}}"
    onsubmit="return confirm('Confirm Order?')">
    @csrf
    @method('PUT')
    <input name="_method" type="hidden" value="put">
    <div class="ui item item-view container">
        <div class="content card-body">
            <div class="row">
                <div class="col-sm-1">
                    @if($fi->contents=='Veg')
                    <img src="https://img.icons8.com/color/48/000000/vegetarian-food-symbol.png" class="v-nv">
                    @else
                    <img src="https://img.icons8.com/color/48/000000/non-vegetarian-food-symbol.png" style="width:25px;height:25px;">
                    @endif               
                </div>
                <div class="col-sm-8">
                    <div class="food-name">
                    {{$fi->food_name}}
                    </div>
                    <div class="food-price">
                    ₹{{$fi->price}}
                    </div>
                    <div class="food-serves">
                        <span>Serves: {{$fi->serves}}</span>
                    </div>
                    <div class="food-description">
                        <span>{{$fi->description}}</span>
                    </div>
                </div>
                @if($fi->quantity>0)
                <div class="col-sm-3 float-right">
                    <input type="number" name="quantity" min="1" max="{{ $fi->quantity }}" value='1'>
                    <button class="btn btn-success " type="submit">Order</button>
                </div>
                @else
                <div class="col-sm-3 float-right">
                Out Of Stock!!
                </div>
                @endif
            </div>
        </div>
    </div>
    </form>
    @endif
    @endforeach
</div>


<div class="menu-items">
    <h2  class="categ">Beverages</h2>
    @foreach($food as $fi)
    @if($fi->category=='Beverages')
    
    <form class="form-inline" method='POST' action="menu/{{$fi->id}}"
    onsubmit="return confirm('Confirm Order?')">
    @csrf
    @method('PUT')
    <input name="_method" type="hidden" value="put">
    <div class="ui item item-view container">
        <div class="content card-body">
            <div class="row">
                <div class="col-sm-1">
                    @if($fi->contents=='Veg')
                    <img src="https://img.icons8.com/color/48/000000/vegetarian-food-symbol.png" class="v-nv">
                    @else
                    <img src="https://img.icons8.com/color/48/000000/non-vegetarian-food-symbol.png" style="width:25px;height:25px;">
                    @endif               
                </div>
                <div class="col-sm-8">
                    <div class="food-name">
                    {{$fi->food_name}}
                    </div>
                    <div class="food-price">
                    ₹{{$fi->price}}
                    </div>
                    <div class="food-serves">
                        <span>Serves: {{$fi->serves}}</span>
                    </div>
                    <div class="food-description">
                        <span>{{$fi->description}}</span>
                    </div>
                </div>
                @if($fi->quantity>0)
                <div class="col-sm-3 float-right">
                    <input type="number" name="quantity" min="1" max="{{ $fi->quantity }}" value='1'>
                    <button class="btn btn-success " type="submit">Order</button>
                </div>
                @else
                <div class="col-sm-3 float-right">
                Out Of Stock!!
                </div>
                @endif
            </div>
        </div>
    </div>
    </form>
    @endif
    @endforeach
</div>

@endsection

   
    
    