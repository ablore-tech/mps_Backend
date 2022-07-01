@extends('layouts.master')
@section('content')

<form action="{{ route('update-profile', [$user->id])}}" method="POST" role="form" enctype="multipart/form-data" class="container-fluid" style="padding-top:50px">
    {{ csrf_field() }}
    <div class="card" style="width: 100%">
        <div class="card-header body_color text-center text-white"><h3>Edit Profile</h3></div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                
                <div class="col-md-6">
                    <input id="name" type="text" name="name" class="form-control" required placeholder="Enter your name" value="{{$user->name}}">
                </div>
            </div>
            
            <div class="form-group row mb-0 mt-5">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn body_color text-white btn-block">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection