@extends('layouts.master')
@section('content')

<form action="{{ route('devices.store') }}" method="POST" role="form" enctype="multipart/form-data" class="container-fluid" style="padding-top:150px">
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
                <label for="series_id" class="col-md-4 col-form-label text-md-right">Select Variant</label>
                
                <select class="col-md-6" name="series_id">
                    @if ($variants)
                        @foreach($variants as $variant)
                            <option value="{{ $variant->id }}">{{ $variant->memory_size }}</option>    
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group row">
                <label for="special_offer" class="col-md-4 col-form-label text-md-right">Special Offer</label>
                
                <div class="col-md-6">
                    <input id="special_offer" type="text" name="special_offer" class="form-control" placeholder="Add special offer here">
                </div>
            </div>

            <div class="form-group row">
                <label for="camera" class="col-md-4 col-form-label text-md-right">Camera</label>
                
                <div class="col-md-6">
                    <input id="camera" type="text" name="camera" class="form-control" placeholder="Add camera details here">
                </div>
            </div>

             <label for="questions" class="col-md-4 col-form-label text-md-right">Questions Prices</label>
            
            @foreach($questions as $question)
                <div class="form-group row">
                    <label for="question[{{$question->id}}]" class="col-md-4 col-form-label text-md-right">{{ $question->description }}</label>
                    
                    <div class="col-md-6">
                        <input id="question[{{$question->id}}]" type="text" name="question[{{$question->id}}]" class="form-control" placeholder="Add price here">
                    </div>
                </div>
            @endforeach      

            <label for="phone_problems" class="col-md-4 col-form-label text-md-right">Phone Problems Prices</label>
            
            @foreach($phone_problems as $phone_problem)

                <label for="phone_problem" class="col-md-4 col-form-label text-md-right">{{$phone_problem->description}}</label>
                
                <div class="form-group row">
                    <label for="phone_problem[{{$phone_problem->id}}]" class="col-md-4 col-form-label text-md-right">{{ $phone_problem->description }}</label>
                    
                    <div class="col-md-6">
                        <input id="phone_problem[{{$phone_problem->id}}]" type="text" name="phone_problem[{{$phone_problem->id}}]" class="form-control" placeholder="Add price here">
                    </div>
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