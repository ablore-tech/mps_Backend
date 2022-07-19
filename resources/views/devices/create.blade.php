@extends('layouts.master')
@section('content')

<form action="{{ route('devices.store') }}" method="POST" role="form" enctype="multipart/form-data" class="container-fluid" style="padding-top:50px">
{{ csrf_field() }}
    <div class="card" style="width: 100%">
        <div class="card-header body_color text-center text-white"><h3>Add Device details</h3></div>
        <div class="card-body">
            <div class="form-group row">
                <label for="model_id" class="col-md-4 col-form-label text-md-right">Select Model</label>
                
                <select class="col-md-6" name="model_id">
                    @if ($models)
                        @foreach($models as $model)
                            <option value="{{ $model->id }}">{{ $model->name }}</option>    
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group row">
                <label for="variant_id" class="col-md-4 col-form-label text-md-right">Select Variant</label>
                
                <select class="col-md-6" name="variant_id">
                    @if ($variants)
                        @foreach($variants as $variant)
                            <option value="{{ $variant->id }}">{{ $variant->memory_size }}</option>    
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group row">
                <label for="device_price" class="col-md-4 col-form-label text-md-right">Device Price</label>
                
                <div class="col-md-6">
                    <input id="device_price" type="text" name="device_price" class="form-control" required placeholder="Add device price here">
                </div>
            </div>

            <div class="form-group row">
                <label for="special_offer" class="col-md-4 col-form-label text-md-right">Special Offer</label>
                
                <div class="col-md-6">
                    <input id="special_offer" type="text" name="special_offer" class="form-control" placeholder="Add special offer here">
                </div>
            </div>

            <div class="form-group row">
                <label for="special_offer_2" class="col-md-4 col-form-label text-md-right">Special Offer 2</label>
                
                <div class="col-md-6">
                    <input id="special_offer_2" type="text" name="special_offer_2" class="form-control" placeholder="Add special offer 2 details here">
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