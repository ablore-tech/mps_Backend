@extends('layouts.master')
@section('content')

<form  class="container-fluid" style="padding-top:50px">
{{ csrf_field() }}
    <div class="card" style="width: 100%">
        <div class="card-header body_color text-center text-white"><h3>View Device details</h3></div>
        <div class="card-body">
            <div class="form-group row">
                <label for="model_id" class="col-md-4 col-form-label text-md-right">User Name</label>
                
                <div class="col-md-6 form-control">
                    {{$order->user->name}}
                </div>
            </div>

            <div class="form-group row">
                <label for="variant_id" class="col-md-4 col-form-label text-md-right">Variant</label>
                
                <div class="col-md-6">
                    {{$order->variant->memory_size}}
                </div>
            </div>

            <div class="form-group row">
                <label for="device_price" class="col-md-4 col-form-label text-md-right">Device Name</label>
                
                <div class="col-md-6">
                    {{$order->device->name}}                
                </div>
            </div>

            @foreach($order->questionResponses as $questionResponse)
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ $questionResponse->question->description }}</label>
                    
                    <div class="col-md-6">
                        {{ $questionResponse->answer === 1 ? "Yes" : "No" }}
                    </div>
                </div>
            @endforeach 

            @foreach($order->phoneProblemResponses as $phoneProblemResponse)
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ $phoneProblemResponse->phoneProblem->description }}</label>
                    
                    <div class="col-md-6">
                        @foreach(json_decode($phoneProblemResponse->answers) as $answer)
                            {{ $answer}}
                        @endforeach             
                    </div>
                </div>
            @endforeach 

        </div>
    </div>
</form>

@endsection