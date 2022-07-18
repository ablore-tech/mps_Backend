@extends('layouts.master')
@section('content')
<div class="container-fluid max-width: 100% max-height: 100%">

  <div class="spacing card-columns">
    <div class="card bg-white">
      <!-- <img class="card-img-top" src="/images/brands.jpeg" alt="brands" style="height: 300px"> -->
      <div class="card-body text-center">
          <h4 class="card-title">Brands</h4>
        <p class="card-text">Add Brands here</p>
        <a href="{{url('brands/create')}}" class="btn body_color text-white">Add</a>
      </div>
    </div>
     
    <div class="card bg-white">
      <!-- <img class="card-img-top" src="/images/series.jpeg" alt="series" style="height: 300px"> -->
      <div class="card-body text-center">
          <h4 class="card-title">Series</h4>
        <p class="card-text">Add Series here</p>
        <a href="{{url('series/create')}}" class="btn body_color text-white">Add</a>
      </div>
    </div>

    <div class="card bg-white">
      <!-- <img class="card-img-top" src="/images/models.jpeg" alt="models" style="height: 300px"> -->
      <div class="card-body text-center">
          <h4 class="card-title">Model</h4>
        <p class="card-text">Add Models here</p>
        <a href="{{url('phone-models/create')}}" class="btn body_color text-white">Add</a>
      </div>
    </div>

    <div class="card bg-white">
      <!-- <img class="card-img-top" src="/images/devices.jpeg" alt="devices" style="height: 300px"> -->
      <div class="card-body text-center">
          <h4 class="card-title">Variants</h4>
        <p class="card-text">Add Variants here</p>
        <a href="{{url('variants/create')}}" class="btn body_color text-white">Add</a>
      </div>
    </div>

    <div class="card bg-white">
      <!-- <img class="card-img-top" src="/images/devices.jpeg" alt="devices" style="height: 300px"> -->
      <div class="card-body text-center">
          <h4 class="card-title">Device Details</h4>
        <p class="card-text">Add Device details here</p>
        <a href="{{url('devices/create')}}" class="btn body_color text-white">Add</a>
      </div>
    </div>

    <div class="card bg-white">
      <!-- <img class="card-img-top" src="/images/devices.jpeg" alt="devices" style="height: 300px"> -->
      <div class="card-body text-center">
          <h4 class="card-title">City</h4>
        <p class="card-text">Add City here</p>
        <a href="{{url('cities/create')}}" class="btn body_color text-white">Add</a>
      </div>
    </div>

    <div class="card bg-white">
      <!-- <img class="card-img-top" src="/images/devices.jpeg" alt="devices" style="height: 300px"> -->
      <div class="card-body text-center">
          <h4 class="card-title">Version</h4>
        <p class="card-text">Add Version here</p>
        <a href="{{url('versions/create')}}" class="btn body_color text-white">Add</a>
      </div>
    </div>
  </div>

</div>
@endsection