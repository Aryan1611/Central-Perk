@extends('layouts.template')
@section('title','Cart')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="text-center">~CART~</h1>
  </div>
</div>
<?php 
$sum = 0;
?>
<span style="display:none;">{{ $c = count($cart) }}</span>
@if($c>0)
<div class="container">
    <div class="card-body">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark"> 
                <tr>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cart as $s)
            <span style="display:none;">{{ $sum = $sum + ($s->price * $s->quantity) }}</span>
            @endforeach
            <form class="form-inline" method='POST' action="menu/{{$sum}}"
            onclick="return confirm('Confirm Payment?')">
            @csrf
            @method('DELETE')
            <input name="_method" type="hidden" value="delete">
            @foreach($cart as $o)
                <tr>
                    <td>{{ $o->food_name }}</td>
                    <td>{{ $o->price }}</td>  
                    <td>{{ $o->quantity }}</td>  
                    <td>{{ $o->price * $o->quantity }}</td>
                    <td>
                    <div>
                    <a href="#" class="btn btn-danger btn-sm open-m" data-val="{{$o->id}}" data-toggle="modal" data-target="#oModal" data-action="Edit" >

                        <i class="fa fa-trash" data-toggle="tooltip"></i>
                    </a>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        <h2 class="float-right">Grand Total : &#8377;{{ $sum }}/-</h2>
        <a href="{{ route('menu.index') }}" class="btn btn-primary button1" >Order More</a>
        <button class="btn btn-success button2" type="submit">Confirm Order</button>
        </div>
        </form>
    </div>
</div>

<!-- New Modal Window -->
<div class="modal fade" id="oModal" tableindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remove Item from Cart?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <input type='hidden' name='xyz' id='xyz' value=''>
                <div id='abc'>
                <span style="display:none;">{{ $qw = session('item') }}</span>
                </div>
                <form class="form-inline" method="post" action="cart/{{$qw}}" 
                    onsubmit="return confirm('Are You Sure You Want to Delete the Food?')">
                    @csrf
                    @method('DELETE')
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <button type="submit" class="btn btn-danger btn-sm">
                        Confirm Delete?
                        </button>
                </form>
                </div>
            </div>    
        </div>
</div>
@else
<h2 style="text-align:center">Nothing ordered yet !</h2>
<a class='btn btn-primary button' href="{{ route('menu.index') }}">Order Now!</a>
@endif
<style>
.button {
            position : absolute;
            top : 70%;
            left : 45%;
}
.button1 {
            position : absolute;
            left : 40%;
}
.button2 {
            position : absolute;
            left : 50%;
}
</style>

<script>
$(document).on('click','.open-m', function () {
  var myVal = $(this).data('val');
//   console.log(myVal);
  $('.modal-body #xyz').val(myVal);
  var jsvar=document.getElementById('xyz').value;
console.log(jsvar);
document.getElementById('abc').innerHTML="<?php
$phpvar='"+jsvar+"';
// echo $phpvar;
session(['item' => $phpvar]);
echo session('item'); ?>";
});
</script>
@endsection
	


