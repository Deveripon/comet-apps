@extends('frontend.layouts.app')

@section('main')


@php

  $slider = App\Models\Slider::get()
@endphp

<section id="home">
  <!-- Home Slider-->
  <div id="home-slider" class="flexslider">
 
    <ul class="slides">
      @foreach($slider as $slide)
      <li>
        <img src="{{url('storage/slider_image/'.$slide -> photo)}}" alt="">
        <div class="slide-wrap">
          <div class="slide-content">
            <div class="container">
              <h1>{{$slide -> title}}</h1><span class="red-dot"></span></h1>
              <h6>{{$slide -> subtile}}</h6>

              <p>
                @foreach(json_decode($slide -> buttons) as $btn)
                <a href="{{$btn -> btn_link}}" class="{{$btn -> btn_type}}">{{$btn -> btn_name}}</a>
                @endforeach
              </p>
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>


  </div>
  <!-- End Home Slider-->
</section>

@include('frontend.section.about')
@include('frontend.section.expertise')
@include('frontend.section.vision')
@include('frontend.section.portfolio')
@include('frontend.section.clients')
@include('frontend.section.portfolio')
@include('frontend.section.blog')

@endsection