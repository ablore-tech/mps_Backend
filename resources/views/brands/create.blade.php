@extends('layouts.master')
@section('content')

<form action="{{ route('brands.store') }}" method="POST" role="form" enctype="multipart/form-data" class="container-fluid" style="padding-top:150px">
    {{ csrf_field() }}
    <div class="card" style="width: 100%">
        <div class="card-header body_color text-center text-white"><h3>Add Brand</h3></div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                
                <div class="col-md-6">
                    <input id="name" type="text" name="name" class="form-control" placeholder="Add brand here">
                </div>
            </div>

            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control" name="image" placeholder="Add image here">
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