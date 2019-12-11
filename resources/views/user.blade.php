@extends('layouts.myapp')

@section('content')
<section class="content">
    
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif


    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Food</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Customer Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cust as $cu)
                    <tr>
                        <td>{{ $cu->id }}</td>
                        <td>{{ $cu->name }}</td>
                        <td>{{ $cu->email }}</td>
                        <td>{{ $cu->phone }}</td>
                        <td>{{ $cu->address }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection