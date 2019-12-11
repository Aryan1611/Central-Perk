@extends('layouts.myapp')
@section('content')
<div class="card">
        <div class="card-header">
            <h2 class="card-title">Food</h2>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fiModal" data-action="Create" >Add Food</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Order Id</th>
                        <th>Customer Id</th>
                        <th>Food Id</th>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Ordered At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all as $a)
                    <tr>
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->order_id }}</td>
                        <td>{{ $a->cust_id }}</td>
                        <td>{{ $a->food_id }}</td>
                        <td>{{ $a->food_name }}</td>
                        <td>{{ $a->price }}</td>
                        <td>{{ $a->quantity }}</td>
                        <td>{{ $a->created_at }}</td>
                        <td>{{ $a->status }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <form class="form-inline" method="get" action="{{ route('confirm' ,[$a->id]) }}" 
                                onsubmit="return confirm('Mark Order as Confirmed?')">
                                @csrf
                                <!-- @method('PUT')
                                    <input type="hidden" name="_method" value="put"> -->
                                    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                    
                                    <button type="submit" class="btn btn-success btn-sm">Confirm
                                    </button>
                                </form>
                                
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection