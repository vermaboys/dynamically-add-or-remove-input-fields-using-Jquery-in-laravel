@extends('layouts.teamLayout')
@section('title', 'Team')
@section('content')
<!-- Content Header (Page header) -->
<div class="container">
    <div class="row heading heading-icon">
        <h2>Our Team</h2>
    </div>
    @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
    @endif
    <ul class="row">
      @if(sizeof($data)>0)
        @foreach($data  as $values)
          <li class="col-12 col-md-6 col-lg-3">
            <div class="cnt-block equal-hight">
              <figure>
                @if(file_exists( public_path().'/team/'.$values->image ) && $values->image!='')
                  <img src="{{url('public/team/'.$values->image)}}" alt="{{$values->image}}"  class="img-responsive">
                @else
                  <img src="{{url('public/img/default.png')}}" alt="default">
                @endif
              </figure>
              <h3>{{$values->name}}</h3>
            </div>
          </li>
        @endforeach
      @else
      <li class="text-center"><img src="{{url('public/img/no-record-found.jpg')}}"></li>
      @endif
    </ul>
</div>

@endsection