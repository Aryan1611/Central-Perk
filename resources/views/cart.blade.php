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
<div class="container-fluid">
        <div class="table-responsive">
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
        </div>
        <div class="row my-4">
            <div class="col-sm-8 button1">
                <a href="{{ route('menu.index') }}" class="btn btn-primary my-2" >Order More</a>
                <button class="btn btn-success btn-sm" type="submit">Confirm Order</button>
            </div>
            <div class="col-sm-4 my-2">
                <h2>Grand Total : &#8377;{{ $sum }}/-</h2>
            </div>
        </div>
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
                <form class="form-inline" method="post" action="cart" 
                    onsubmit="return confirm('Are You Sure You Want to Delete the Food?')">
                    @csrf
                        <input type='hidden' name='del_id' id='del_id' value=''>
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
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h2 style="text-align:center">Nothing ordered yet !</h2>
            <a class='btn btn-primary button' href="{{ route('menu.index') }}">Order Now!</a>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
@endif
<style>
.button {
    margin:15% 30%;
}
.button1 {
    padding-left: 30%;
}
</style>

<script>
$(document).on('click','.open-m', function () {
  var myVal = $(this).data('val');
  $('.modal-body #del_id').val(myVal);
});
</script>
@endsection
	


