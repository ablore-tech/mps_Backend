@extends('layouts.master')
@section('content')

<div class="container-fluid container">
    <div class="card">
        <div class="card-body">
            <div class="card-header text-center body_color text-white">
                <h1>Version List</h1>
            </div>

            <table class="table table-hover text-center table-bordered">
                <thead>
                    <tr class="bg-info text-dark" style="height:60px">
                        <th scope="col">S.No</th>
                        <th scope="col">Number</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($versions as $version)
                        <tr>
                            <td> {{ ++$i }}</td>
                            <td> {{ $version->version_no }}</td>
                            <td> {{ $version->version_description }}</td>
                            <td> {{ $version->type }}</td>
                            <!-- <td> 
                                <span class="btn btn-info">Edit </span>
                                <span class="btn btn-success">View </span>
                                <span class="btn btn-danger">Delete</span>
                            </td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection