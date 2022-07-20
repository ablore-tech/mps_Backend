@extends('layouts.master')
@section('content')

<form action="{{  url('device/'. $device->id .'/'. $deviceVariantPrice->id) }}" method="POST" role="form" enctype="multipart/form-data" class="container-fluid" style="padding-top:50px">
{{ csrf_field() }}
    <div class="card" style="width: 100%">
        <div class="card-header body_color text-center text-white"><h3>Edit Device details</h3></div>
        <div class="card-body">
            <div class="form-group row">
                <label for="model_id" class="col-md-4 col-form-label text-md-right">Name</label>
                
                <div class="col-md-6">
                    {{$device->name}}
                </div>
            </div>

            <div class="form-group row">
                <label for="variant_id" class="col-md-4 col-form-label text-md-right">Variant</label>
                
                <div class="col-md-6">
                    {{$deviceVariantPrice->variant->memory_size}}
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                
                <select class="col-md-6" name="status">
                        @foreach(config('settings.device_status') as $status => $value)
                            <option value="{{ $value }}" @if($value == $deviceVariantPrice->status) selected @endif>{{ $status }}</option>    
                        @endforeach
                </select>
            </div>

            <div class="form-group row">
                <label for="device_price" class="col-md-4 col-form-label text-md-right">Device Price</label>
                
                <div class="col-md-6">
                    <input id="device_price" type="text" name="device_price" class="form-control" required placeholder="Add device price here" value="{{$deviceVariantPrice->price}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="special_offer" class="col-md-4 col-form-label text-md-right">Special Offer</label>
                
                <div class="col-md-6">
                    <input id="special_offer" type="text" name="special_offer" class="form-control" placeholder="Add special offer here" value="{{$deviceVariantPrice->special_offers}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="special_offer_2" class="col-md-4 col-form-label text-md-right">Special Offer 2</label>
                
                <div class="col-md-6">
                    <input id="special_offer_2" type="text" name="special_offer_2" class="form-control" placeholder="Add special offer 2 details here" value="{{$deviceVariantPrice->special_offers_2}}">
                </div>
            </div>

            <label for="question_prices" class="col-md-4 col-form-label text-md-right">Device Questions</label>
            
            @foreach($device->deviceQuestionPrices as $deviceQuestionPrice)
                <div class="form-group row">
                    <label for="device_question_prices[{{$deviceQuestionPrice->id}}]" class="col-md-4 col-form-label text-md-right">{{ $deviceQuestionPrice->question->description }}</label>
                    
                    <div class="col-md-6">
                        <input id="device_question_prices[{{$deviceQuestionPrice->id}}]" type="text" name="device_question_prices[{{$deviceQuestionPrice->id}}]" required class="form-control" placeholder="Add price here" value="{{ $deviceQuestionPrice->price }}">
                    </div>
                </div>
            @endforeach      

            <label for="phone_problem_prices" class="col-md-4 col-form-label text-md-right">Phone Problems</label>
            
            @foreach($device->devicePhoneProblemPrices as $phoneProblemPrice)
                <div class="form-group row">
                    <label for="phone_problem_prices" class="col-md-4 col-form-label text-md-right">{{$phoneProblemPrice->phoneProblemOption->name}}</label>
                
                    <div class="col-md-6">
                        <input id="phone_problem_prices[{{$phoneProblemPrice->id}}]" type="text" name="phone_problem_prices[{{$phoneProblemPrice->id}}]" required class="form-control" placeholder="Add price here" value="{{ $phoneProblemPrice->price }}">
                    </div>
                </div>
            @endforeach 

            <div class="form-group row mb-0 mt-5">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn body_color text-white btn-block">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection