@extends('layouts.template')
@section('title','Order Details')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="text-center">~Order Details~</h1>
  </div>
</div>
<?php
$sum=0;
?>
<div class="container">
    <div class="card-body">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark"> 
                <tr>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($details as $s)
            <span style="display:none;">{{ $sum = $sum + ($s->price * $s->quantity) }}</span>
            @endforeach
            @foreach($details as $det)
                <tr>
                    <td>{{ $det->food_name }}</td>
                    <td>{{ $det->price }}</td>  
                    <td>{{ $det->quantity }}</td>  
                    <td>{{ $det->price * $det->quantity }}</td>
                    @if($det->status=='pending')
                    <td style='color:red'>{{ $det->status }}</td>
                    @else
                    <td style='color:green'>{{ $det->status }}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        <h2 class="float-right">Grand Total : &#8377;{{ $sum }}/-</h2>
        </div>
        <a class='btn btn-primary button' href="{{ route('order.index') }}">Back</a>
    </div>
</div>
@endsection