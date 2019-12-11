@extends('layouts.template')
@section('title','My Orders')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="text-center">~My Orders~</h1>
  </div>
</div>
<?php
$x=0;
?>
<span style="display:none;">{{ $c = count($order) }}</span>
@if($c>0)
<div class="menu-items">
    @foreach($order as $oi)
    @if($x!=$oi->order_id)
    @if($oi->quantity>0)
    <form class="form-inline" method='GET' action="order/{{$oi->order_id}}">
    @csrf
    <!-- @method('PUT')
    <input name="_method" type="hidden" value="put"> -->
    <div class="ui item item-view container">
        <div class="content card-body">
            <div class="row">
                <div class="col-s-1">
                    Order:{{$oi->order_id}}             
                </div>
                <div class="col-s-3">
                <button class="btn btn-primary " type="submit">View Details</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <span style="display:none;">{{ $x = $oi->order_id }}</span>
    @endif
    @endif
    @endforeach
</div>
@else
<h2 style="text-align:center">Nothing ordered yet !</h2>
<a class='btn btn-primary button' href="{{ route('menu.index') }}">Order Now!</a>
@endif
@endsection