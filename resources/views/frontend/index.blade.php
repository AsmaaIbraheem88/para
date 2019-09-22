
@extends('frontend.layouts.front')
@section('title','Home')
@section('content')

    <!-- slider-area start -->
    <div class="slider-area slider-area2 block" id="home">
        <div class="slider-active2 next-prev-style">
            @foreach($slider as $image)

                <div class="slider-items">
                <img src="{{ asset('uploads/slider/'.$image->image) }}" class="slider">
                <div class="slider-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1 col-12">
                                <div class="slider-text text-center">
                                    <div class="line"></div>
                                    <h1>{!! $image->title !!}</h1>
                                    <p>our team is widely for the  <span>highest quality </span> of the products we provide.<span>You can rely on us</span> whether you need furniture for your home. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             @endforeach
           
           
        </div>
    </div>
    <!-- slider-area end -->
    <!-- ablout-area start -->
    <div class="about-area about-area2 ptb-120 block" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 d-none d-sm-block">
                        <div class="about-img2" >
                        <img src="{{ asset('uploads/settings/'.$settings->about_image) }}" alt="" >
                            <div class="about-images">
                                <img src="frontend/assets/images/about/4.jpg" alt="" width="350px" height="350px">
                                <a class="video-popup" href="{{$settings->about_video}}">
                                <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="about-wrap">
                            <h2>About Us</h2>
                           <h3> {!!$settings->about_msg!!}<h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- ablout-area end -->
    @if($section->interesting =='open')  
     <section class="ftco-section ftco-counter img " id="section-counter" style="background-image: url(frontend/assets/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-md-flex align-items-center justify-content-center">
                <div class="col-lg-4">
                    <div class="heading-section pl-md-5 heading-section-white">
                <div class="pl-md-5 ml-md-5 ftco-animate">
                    <span class="subheading">Some</span>
                    <h2 class="mb-4">Interesting Facts</h2>
                </div>
              </div>
                </div>
                <div class="col-lg-8">
                    <div class="row d-md-flex align-items-center">
                  <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                      <div class="text">
                        <strong class="number counter" data-number="18">{{$settings->years_exp}}</strong>
                        <span>Years of Experienced</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                      <div class="text">
                        <strong class="number counter">{{$settings->happy_clients}} </strong>
                        <span>Happy Clients</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center">
                      <div class="text" >
                        <strong class="number  counter" >{{$settings->finished_projects}}</strong>
                        <span>Finished Projects</span>
                      </div>
                    </div>
                  </div>
                  
              </div>
          </div>
        </div>
        </div>
    </section>
    @endif
     <!-- service-area start -->
     <div class="service-area bg-1 block" style="padding: 50px 0" id="services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2>Service We Do</h2>
                        <h3>A wall for our project glory and a place to find more</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-sm-6 col-12 col-lg-4">
                        <div class="service-wrap">
                            <div class="service-img">
                                <img src="{{ asset('uploads/services/'.$service->image) }}" alt="">
                            </div>
                            <div class="service-content">
                                <h4>{{$service->name}}</h4>
                                <p>{{$service->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
               
                  
            </div>
        </div>
    </div>
    <!-- service-area end -->

    
    <!-- testmonial-area start -->
    @if($section->testimonials =='open')  
         <div class="testmonial-area bg-img-2 ptb-120 black-opacity">
        <div class="container">
            <div class="row revarce-wrap">
                
                <div class="col-lg-7 col-md-6 col-12">
                    <div class="test-content-active">
                        @foreach($testimonials as $testimonial)
                        <div class="test-wrap">
                            <i class="fa fa-quote-left"></i>
                            <p>{{$testimonial->client_comment}}</p>
                            <h4>{{$testimonial->client_name}}</h4>
                            <span>{{$testimonial->client_city}}</span>
                        </div>
                         @endforeach
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="test-img-active">
                        @foreach($testimonials as $testimonial)
                        <div class="test-img">
                            <img src="{{ asset('uploads/testimonials/'.$testimonial->photo) }}" alt="">
                            <ul>
                                <li>Project Ratting : </li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <div class="test-images">
                                <img src="{{  asset('uploads/testimonials/'.$testimonial->client_image) }}" alt="">
                            </div>
                        </div>
                         @endforeach
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    @endif
    <!-- testmonial-area end -->
      <!-- .project-area start -->
      <div class="project-area bg-1 block" id="projects">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="section-title">
                        <h2>Latest Projects</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="project-menu text-right">
                        <a class="{{ Request::has('category_id') ? '' : 'active' }}" href="{{ url('/#projects') }}">View All</a>
                        @foreach($categories as $category)
                      
                        <a    
                          href="{{url('/?category_id='.$category->id.'#projects')}}">{{$category->name}}</a>

                        @endforeach
                    </div>
                </div>
            </div>
           
            <div class="row ">
               @foreach($projects as $project)
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="project-wrap" >
                        <img src="{{ asset('uploads/projects/'.$project->image) }}" alt="">
                        <div class="project-content">
                            
                            <a href="{{url('project/show/'.$project->id)}}" ><i class="fa fa-search"></i></a>
                            <h3>{{$project->name}}</h3>  
                            
                        </div>
                      
                    </div>
                
                </div>
                 @endforeach
               
            </div>
            
        </div>
    </div>
    <!-- .project-area end -->
    <!-- .brand-area start -->
    @if($section->clients =='open')  
    <div class="brand-area brand-area2">
        <div class="container">
            <div class="row">
               
               @foreach($clients as $client)
                <div class="col-sm-3 col-3">
                    <div class="brand-wrap text-center" >
                        <img src="{{asset('uploads/clients/'.$client->logo)}}" alt="" >
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </div>
    @endif
    <!-- .brand-area end -->

   
@endsection