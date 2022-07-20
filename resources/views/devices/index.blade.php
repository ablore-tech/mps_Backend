@extends('layouts.master')
@section('content')

<div class="container-fluid container">
    <div class="card">
        <div class="card-body">
            <div class="card-header text-center body_color text-white">
                <h1>Device Details</h1>
            </div>

            <table class="table table-hover text-center table-bordered">
                <thead>
                    <tr class="bg-info text-dark" style="height:60px">
                        <th scope="col">S.No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Variant</th>
                        <th scope="col">Price</th>
                        <th scope="col">Order Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @php
                        $i = 0;
                    @endphp

                    @foreach ($devices as $device)
                        @foreach ($device->deviceVariantPrices as $deviceVariantPrice)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td>
                                    @if ($device->phoneModel->image)
                                        <img src="{{ asset('/storage'.$device->phoneModel->image) }}" width="40" height="40">
                                    @endif
                                </td>
                                <td> {{ $device->phoneModel->name }}</td>
                                <td> {{ $deviceVariantPrice->variant->memory_size }}</td>
                                <td> {{ $deviceVariantPrice->price }}</td>
                                <td> {{ \App\Models\Order::where([
                                    'device_id' => $device->id,
                                    'variant_id' => $deviceVariantPrice->variant->id
                                    ])->pluck('id') }}</td>
                                <td> 
                                    <a class="btn btn-info" href="{{ url('device/'. $device->id .'/'. $deviceVariantPrice->id) }}">Edit </a>
                                    <!-- <a class="btn btn-info" href="{{ url('devices/'. $device->id) }}">View</a> -->
                                    <!-- <span class="btn btn-success">View </span> -->
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection