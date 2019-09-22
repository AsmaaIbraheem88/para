
@extends('frontend.layouts.front')

@section('title','Our Team')

@section('content')

    <!-- breadcumb-area start -->
    <div class="breadcumb-area black-opacity bg-img-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap">
                        <h2>Our Team</h2>
                       <p>The geniuses behind our work</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcumb-area end -->
    <!-- team-area start -->
    <div class="team-area"  >
        <div class="container">
            <div class="row">
                <div class="col-12" >
                    <div class="section-title text-center">
                        <h2>our great team</h2>
                        <h3>A wall for our project glory and a place to find more</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($team as $emplyee)

                <div class="col-lg-3 col-md-4  col-sm-6 col-12">
                    <div class="team-wrap" >
                        
                            <img src="{{asset('uploads/team/'.$emplyee->image)}}">
                       
                        <div class="team-content" >
                            <h4>{{$emplyee->name}}</h4>
                            <p>{{$emplyee->job}}</p>
                            <ul>
                                <li><a href="{{$emplyee->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$emplyee->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                
               @endforeach
            
            </div>
        </div>
    </div>
    <!-- team-area end -->

   
  @endsection