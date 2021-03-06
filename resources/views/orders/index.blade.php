
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
                        <!-- <th scope="col">S.No</th> -->
                        <th scope="col">Order Number</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Device</th>
                        <th scope="col">Variant</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Imei Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            <!-- <td> {{ ++$i }} </td> -->
                            <td> {{ $order->id }}</td>
                            <td> {{ $order->user->name }}</td>
                            <td> {{ $order->description }} </td>
                            <td> {{ $order->device ? $order->device->name : null }}</td>
                            <td> {{ $order->variant ? $order->variant->memory_size : null }}</td>
                            <td> {{ $order->price }}</td>
                            <td> {{ array_search($order->status, config('settings.status')) }}</td>
                            <td> {{ $order->imei }}</td>
                            <td> 
                                <a class="btn btn-info" href="{{ url('chats/'. $order->id) }}">View Chats</a>
                                <a class="btn btn-success" href="{{ url('orders/'. $order->id) }}">View details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {!! $orders->links() !!}
        </div>
    </div>
</div>

@endsection