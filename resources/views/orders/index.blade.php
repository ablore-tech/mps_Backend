
@extends('layouts.master')
@section('content')

<div class="container-fluid container">
    <div class="card">
        <div class="card-body">
            <div class="card-header text-center body_color text-white">
                <h1>Order List</h1>
            </div>

            <table class="table table-hover text-center table-bordered">
                <thead>
                    <tr class="bg-info text-dark" style="height:60px">
                        <th scope="col">S.No</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Device</th>
                        <th scope="col">Variant</th>
                        <th scope="col">Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            <td> {{ ++$i }} </td>
                            <td> {{ $order->user->name }}</td>
                            <td> {{ $order->device->name }}</td>
                            <td> {{ $order->variant->memory_size }}</td>
                            <td> {{ $order->price }}</td>
                            <td> 
                                <a class="btn btn-info" href="{{ url('chats/'. $order->id) }}">View Chats</a>
                                <a class="btn btn-success" href="{{ url('orders/'. $order->id) }}">View details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection