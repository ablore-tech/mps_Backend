@extends('layouts.master')
@section('content')

<form action="{{ route('orders.update', [$order->id])}}" method="POST" role="form" enctype="multipart/form-data" class="container-fluid" style="padding-top:50px">
{{ method_field('PUT') }}
{{ csrf_field() }}
    <div class="card" style="width: 100%">
        <div class="card-header body_color text-center text-white"><h3>View Order details</h3></div>
        <div class="card-body">
            <div class="form-group row">
                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                
                <select class="col-md-6" name="status">
                        @foreach(config('settings.status') as $status => $value)
                            <option value="{{ $value }}" @if($value == $order->status) selected @endif>{{ $status }}</option>    
                        @endforeach
                </select>
            </div>

            <div class="form-group row mt-4">
                <label for="model_id" class="col-md-4 col-form-label text-md-right">User Name</label>
                
                <div class="col-md-6">
                    {{$order->user->name}}
                </div>
            </div>

            <div class="form-group row mt-4">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                
                <div class="col-md-6">
                    {{$order->description}}
                </div>
            </div>

            <div class="form-group row">
                <label for="variant_id" class="col-md-4 col-form-label text-md-right">Variant</label>
                
                <div class="col-md-6">
                    {{$order->variant ? $order->variant->memory_size : null}}
                </div>
            </div>

            <div class="form-group row">
                <label for="device_price" class="col-md-4 col-form-label text-md-right">Device Name</label>
                
                <div class="col-md-6">
                    {{$order->device ? $order->device->name : null }}                
                </div>
            </div>

            <div class="form-group row">
                <label for="device_price" class="col-md-4 col-form-label text-md-right">Price</label>
                
                <div class="col-md-6">
                    {{ $order->price }}        
                </div>
            </div>

            <div class="form-group row">
                <label for="device_price" class="col-md-4 col-form-label text-md-right">IMEI Number</label>
                
                <div class="col-md-6">
                    {{ $order->imei }}                
                </div>
            </div>

            @if($order->questionResponses)
                @foreach($order->questionResponses as $questionResponse)
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ $questionResponse->question->description }}</label>
                        
                        <div class="col-md-6">
                            {{ $questionResponse->answer === 1 ? "Yes" : "No" }}
                        </div>
                    </div>
                @endforeach 
            @endif

            @if($order->phoneProblemResponses)
                @foreach($order->phoneProblemResponses as $phoneProblemResponse)
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ $phoneProblemResponse->phoneProblem->description }}</label>
                        
                        <div class="col-md-6">
                            @foreach(json_decode($phoneProblemResponse->answers) as $answer)
                            {{ \App\Models\PhoneProblemOption::find($answer)->name }}
                            <br>
                            <br>
                            @endforeach             
                        </div>
                    </div>
                @endforeach 
            @endif

            <div class="form-group row mb-0 mt-3">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn body_color text-white btn-block">Update Status</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection