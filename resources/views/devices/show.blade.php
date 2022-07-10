@extends('layouts.master')
@section('content')

<form  class="container-fluid" style="padding-top:50px">
{{ csrf_field() }}
    <div class="card" style="width: 100%">
        <div class="card-header body_color text-center text-white"><h3>View Device details</h3></div>
        <div class="card-body">
            <div class="form-group row">
                <label for="model_id" class="col-md-4 col-form-label text-md-right">Name</label>
                
                <div class="col-md-6 form-control">
                    {{$device->name}}
                </div>
            </div>

            <div class="form-group row">
                <label for="variant_id" class="col-md-4 col-form-label text-md-right">Variant</label>
                
                <div class="col-md-6">
                    {{$device->variant->memory_size}}
                </div>
            </div>

            <div class="form-group row">
                <label for="device_price" class="col-md-4 col-form-label text-md-right">Device Price</label>
                
                <div class="col-md-6">
                    $device->variant->memory_size                
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

             

            <!-- <div class="form-group row mb-0 mt-5">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn body_color text-white btn-block">Add</button>
                </div>
            </div> -->
        </div>
    </div>
</form>

@endsection