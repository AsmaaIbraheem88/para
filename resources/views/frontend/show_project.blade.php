
@extends('frontend.layouts.front')

@section('title','Project Show')

@section('content')

    <!-- breadcumb-area start -->
    <div style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>{{$project->name}}</p> 
                </div>
            </div>
        </div>
    </div>
    <hr style="width: 80%;margin: auto;">
    <!-- breadcumb-area end -->
    <!-- team-area start -->
    <div class="team-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Name : {{$project->name}}</p>
                </div>
                <div class="col-md-4">
                   <p>Date : {{$project->date}}</p>
                </div>
                <div class="col-md-4">
                    <p>Type : {{$project->category->name}}</p>
                </div>
            </div>
        </div>
    </div>
    <hr style="width: 80%;margin: auto;">
    <!-- team-area end -->
  
   <!-- slider-area start -->
   <div class="project-slider" style=" padding: 30px;margin-bottom: 20px">
       <div class="container">
       <div class="row ">
               @foreach($project->project_details  as $image)
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="project-wrap" >
                        <img src="{{ asset('uploads/projects/'.$project->image) }}" alt=""> 
                    </div>
                
                </div>
                 @endforeach
           
            </div>
       </div>
    </div>
    
  @endsection


