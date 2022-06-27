@extends('layouts.master')
@section('content')

<form action="{{ route('brands.store') }}" method="POST" role="form" enctype="multipart/form-data" class="container-fluid" style="padding-top:150px">
    {{ csrf_field() }}
    <div class="card" style="width: 100%">
        <div class="card-header body_color text-center text-white"><h3>Add Variant</h3></div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Ram and memory size</label>
                
                <div class="col-md-6">
                    <input id="name" type="text" name="name" class="form-control" placeholder="Format:- 3/32">
                </div>
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