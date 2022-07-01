@extends('layouts.master')
@section('content')

<div class="container-fluid container">
    <div class="card">
        <div class="card-body">
            <div class="card-header text-center body_color text-white">
                <h1>Series List</h1>
            </div>

            <table class="table table-hover text-center table-bordered">
                <thead>
                    <tr class="bg-info text-dark" style="height:60px">
                        <th scope="col">S.No</th>
                        <th scope="col">Series Name</th>
                        <th scope="col">Brand Name</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                
                <tbody>
                    @php
                        $i = 0;
                    @endphp

                    @foreach ($series as $s)
                        <tr>
                            <td> {{ ++$i }}</td>
                            <td> {{ $s->name }}</td>
                            <td> {{ $s->brand->name }}</td>
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