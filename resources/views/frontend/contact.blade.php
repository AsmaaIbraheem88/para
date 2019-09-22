@extends('frontend.layouts.front')

@section('title','Contact Us')

@section('content')



    <!-- breadcumb-area start -->
    <div class="breadcumb-area black-opacity bg-img-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap">
                        <h4>We Love To Hear From You</h4>
                       <p>when you have a question about anything our team is ready to answer all your question </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcumb-area end -->
    <!-- contact-area start -->
    <div class="contact-area pt-120" >
        <div class="container">
            <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                    <div class="contact-wrap">
                    <p class="para"><i class="fa fa-location-arrow"></i> Location</p><p>{{$settings->address}}</p><hr>
                    <p class="para" > <i class="fa fa-phone"></i> Phone</p><p>{{$settings->phone}}<br></p>
                    <hr style="">
                    <p class="para" > <i class="fa fa-envelope"></i> Email</p><p>{{$settings->email}}<br></p>  
    
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="contact-form">
                    <h5  style="margin-bottom: 35px;">Say Your Quession</h5>
                   
                        <div class="cf-msg"></div>
                        
                        @include('frontend.layouts.message')

                        <form action="{{url('contact')}}" method="post" id="cf">
                             {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <input type="text" placeholder="Name" id="name" name="name">
                                </div>
                                <div class="col-md-12 col-12">
                                    <input type="text" placeholder="Subject" id="subject" name="subject">
                                </div>
                                <div class="col-md-12 col-12">
                                    <input type="text" placeholder="Email" id="email" name="email">
                                </div>
                            
                                <div class="col-12">
                                    <textarea class="contact-textarea" placeholder="Message" id="msg" name="message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button  class="cont-submit btn-contact btn-style" name="send">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
        <!-- <div id="googleMap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3454.4570826564373!2d31.422559000000003!3d30.023741999999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf81fffb525873ca5!2sModern%20English%20School%2C%20Cairo!5e0!3m2!1sen!2sus!4v1568825380555!5m2!1sen!2sus" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div> -->


  
  

  @endsection
  <!-- #446084 -->
  <!-- #368cbf -->
<!-- 
<section class="section has-mask mask-arrow" id="section_252838079">
    
<div class="bg section-bg fill bg-fill  bg-loaded">

</div>
<div class="section-content relative">
    <div class="row row-small row-dashed mycolor" id="row-242846084">
        <div class="col medium-7 small-12 large-7">
            <div class="col-inner">
                <div class="icon-box featured-box icon-box-left text-left">
                    <div class="icon-box-img" style="width: 30px">
                    <div class="icon">
                        <div class="icon-inner"> <img width="300" height="300" src="https://alltalentgroup.com/wp-content/uploads/2019/05/building-300x300.png" class="attachment-medium size-medium lazyloaded" alt="" data-lazy-srcset="https://alltalentgroup.com/wp-content/uploads/2019/05/building-300x300.png 300w, https://alltalentgroup.com/wp-content/uploads/2019/05/building-150x150.png 150w, https://alltalentgroup.com/wp-content/uploads/2019/05/building.png 512w" data-lazy-sizes="(max-width: 300px) 100vw, 300px" data-lazy-src="https://alltalentgroup.com/wp-content/uploads/2019/05/building-300x300.png" sizes="(max-width: 300px) 100vw, 300px" srcset="https://alltalentgroup.com/wp-content/uploads/2019/05/building-300x300.png 300w, https://alltalentgroup.com/wp-content/uploads/2019/05/building-150x150.png 150w, https://alltalentgroup.com/wp-content/uploads/2019/05/building.png 512w" data-was-processed="true">
                        <noscript>
                            <img width="300" height="300" src="https://alltalentgroup.com/wp-content/uploads/2019/05/building-300x300.png" class="attachment-medium size-medium" alt="" srcset="https://alltalentgroup.com/wp-content/uploads/2019/05/building-300x300.png 300w, https://alltalentgroup.com/wp-content/uploads/2019/05/building-150x150.png 150w, https://alltalentgroup.com/wp-content/uploads/2019/05/building.png 512w" sizes="(max-width: 300px) 100vw, 300px" />
                        </noscript>
                    </div>
                </div>
            </div>
            <div class="icon-box-text last-reset">
                <h3>Our Offices</h3>
            </div>
            </div><div class="is-divider divider clearfix" style="max-width:75%;height:1px;">
        </div>
        <div class="gap-element clearfix" style="display:block; height:auto; padding-top:4px"></div>
        <h3>Saudi Arabia</h3><p><i class="fa fa-map-marker"></i> TheOffice Building, Tahlia St., Jeddah, KSA.<br>+966500036594 / +966126348493<br><a href="mailto:info@alltalentgroup.com%20-%20projects@alltalentgroup.com">info@alltalentgroup.com</a></p><div class="is-divider divider clearfix" style="margin-top:0.8em;margin-bottom:0.8em;max-width:100%;height:1px;">
    </div>
    <h3>Egypt</h3><p><i class="fa fa-map-marker"></i>44 Moustafa Al Nahhas with Abbas El Aqqad, Nasr City, Cairo<br>+201007918992 / +201002613520<br><a href="mailto:info@alltalentgroup.com%20-%20projects@alltalentgroup.com">info@alltalentgroup.com</a></p>
    <div class="is-divider divider clearfix" style="margin-top:0.8em;margin-bottom:0.8em;max-width:100%;height:1px;">
</div>
<h3>United Arab Emirates</h3><p><i class="fa fa-map-marker"></i>Burj Khalifa Area, Business Bay, Bayswater Tower, Office P401, Dubai<br><i class="fa fa-phone"></i> +97144511148 / +971553661414 / +971553661515<br><a href="mailto:info@alltalentgroup.com%20-%20projects@alltalentgroup.com">info@alltalentgroup.com</a></p></div></div><div class="col medium-5 small-12 large-5"><div class="col-inner"><div class="icon-box featured-box icon-box-left text-left"><div class="icon-box-img" style="width: 30px"><div class="icon"><div class="icon-inner"> <img width="300" height="300" src="https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation-300x300.png" class="attachment-medium size-medium lazyloaded" alt="" data-lazy-srcset="https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation-300x300.png 300w, https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation-150x150.png 150w, https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation.png 512w" data-lazy-sizes="(max-width: 300px) 100vw, 300px" data-lazy-src="https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation-300x300.png" sizes="(max-width: 300px) 100vw, 300px" srcset="https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation-300x300.png 300w, https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation-150x150.png 150w, https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation.png 512w" data-was-processed="true"><noscript><img width="300" height="300" src="https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation-300x300.png" class="attachment-medium size-medium" alt="" srcset="https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation-300x300.png 300w, https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation-150x150.png 150w, https://alltalentgroup.com/wp-content/uploads/2019/05/interrogation.png 512w" sizes="(max-width: 300px) 100vw, 300px" /></noscript></div></div></div><div class="icon-box-text last-reset"><h3>Ask about anything!</h3></div></div><div class="is-divider divider clearfix" style="max-width:75%;height:1px;"></div><div role="form" class="wpcf7" id="wpcf7-f88-p180-o1" lang="en-US" dir="ltr"><div class="screen-reader-response"></div><form action="/contact/#wpcf7-f88-p180-o1" method="post" class="wpcf7-form" novalidate="novalidate"><div style="display: none;"> <input type="hidden" name="_wpcf7" value="88"> <input type="hidden" name="_wpcf7_version" value="5.1.3"> <input type="hidden" name="_wpcf7_locale" value="en_US"> <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f88-p180-o1"> <input type="hidden" name="_wpcf7_container_post" value="180"></div><div class="here"> <label> Your Name (required)<br> <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </label><p></p><p><label> Your Email (required)<br> <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </label></p><p><label> Subject<br> <span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </label></p><p><label> Your Message<br> <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </label></p><p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></p></div><div class="wpcf7-response-output wpcf7-display-none"></div></form></div></div></div><style scope="scope"></style></div></div><style scope="scope">#section_252838079{padding-top:62px;padding-bottom:62px;background-color:rgb(246,246,246)}</style></section> -->