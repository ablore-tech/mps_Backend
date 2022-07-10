@extends('layouts.master')
@section('content')

<form action="{{ route('devices.update', ['device' => $device->id]) }}" method="PUT" role="form" enctype="multipart/form-data" class="container-fluid" style="padding-top:50px">
{{ csrf_field() }}
    <div class="card" style="width: 100%">
        <div class="card-header body_color text-center text-white"><h3>Edit Device details</h3></div>
        <div class="card-body">
            <div class="form-group row">
                <label for="model_id" class="col-md-4 col-form-label text-md-right">Name</label>
                
                <div class="col-md-6">
                    $device->name
                </div>
            </div>

            <div class="form-group row">
                <label for="variant_id" class="col-md-4 col-form-label text-md-right">Variant</label>
                
                <select class="col-md-6">
                    $device->variant->memory_size
                </select>
            </div>

            <div class="form-group row">
                <label for="device_price" class="col-md-4 col-form-label text-md-right">Device Price</label>
                
                <div class="col-md-6">
                    <input id="device_price" type="text" name="device_price" class="form-control" required placeholder="Add device price here" value="{{$device->price}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="special_offer" class="col-md-4 col-form-label text-md-right">Special Offer</label>
                
                <div class="col-md-6">
                    <input id="special_offer" type="text" name="special_offer" class="form-control" placeholder="Add special offer here" value="{{$device->special_offer}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="camera" class="col-md-4 col-form-label text-md-right">Camera</label>
                
                <div class="col-md-6">
                    <input id="camera" type="text" name="camera" class="form-control" required placeholder="Add camera details here" value="{{$device->camera}}">
                </div>
            </div>

             <label for="question_prices" class="col-md-4 col-form-label text-md-right">Questions</label>
            
            @foreach($questions as $question)
                <div class="form-group row">
                    <label for="question_prices[{{$question->id}}]" class="col-md-4 col-form-label text-md-right">{{ $question->description }}</label>
                    
                    <div class="col-md-6">
                        <input id="question_prices[{{$question->id}}]" type="text" name="question_prices[{{$question->id}}]" required class="form-control" placeholder="Add price here">
                    </div>
                </div>
            @endforeach      

            <label for="phone_problem_prices" class="col-md-4 col-form-label text-md-right">Phone Problems</label>
            
            @foreach($phoneProblems as $phoneProblem)
                <div class="form-group row">
                    <label for="phone_problem_prices" class="col-md-4 col-form-label text-md-right">{{$phoneProblem->description}}</label>
                
                    @foreach($phoneProblem->phoneProblemOptions as $phoneProblemOption)
                        <div class="form-group row">
                            <label for="phone_problem_prices[{{$phoneProblem->id}}][{{$phoneProblemOption->id}}]" class="col-md-4 col-form-label text-md-right">{{ $phoneProblemOption->name }}</label>
                            
                            <div class="col-md-6">
                                <input id="phone_problem_prices[{{$phoneProblem->id}}][{{$phoneProblemOption->id}}]" type="text" name="phone_problem_prices[{{$phoneProblem->id}}][{{$phoneProblemOption->id}}]" required class="form-control" placeholder="Add price here">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach 

            <div class="form-group row mb-0 mt-5">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn body_color text-white btn-block">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection