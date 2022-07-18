@extends('layouts.master')
@section('content')

<form action="{{ route('versions.store') }}" method="POST" role="form" enctype="multipart/form-data" class="container-fluid" style="padding-top:150px">
    {{ csrf_field() }}
    <div class="card" style="width: 100%">
        <div class="card-header body_color text-center text-white"><h3>Add Version</h3></div>
        <div class="card-body">
            <div class="form-group row">
                <label for="number" class="col-md-4 col-form-label text-md-right">Number</label>
                
                <div class="col-md-6">
                    <input id="number" type="text" name="number" class="form-control" required placeholder="add version number">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                
                <div class="col-md-6">
                    <input id="description" type="text" name="description" class="form-control" required placeholder="add version description">
                </div>
            </div>

            <div class="form-group row">
                <label for="type" class="col-md-4 col-form-label text-md-right">Select Type</label>
                
                <select class="col-md-5" name="type">
                    <option value="Android"> Android </option>
                    <option value="IOS"> IOS </option>
                </select>
            </div>

            <div class="form-group row mb-0 mt-5">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn body_color text-white btn-block">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection