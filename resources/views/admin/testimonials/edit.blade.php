@extends('admin.index')
@section('title')
Testimonials
@endsection

@section('sub_title')
Testimonial Edit
@endsection

@section('back')
  <li><a href="{{aurl('testimonials')}}" class="btn btn-primary">Back</a></li>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
  </div>
   <!-- /.box-header -->
   <div class="box-body">
    {!! Form::open(['url'=>aurl('testimonials/'.$testimonial->id),'method'=>'put','files'=>true ]) !!}

    <div class="form-group">
        {!! Form::label('client_name','Client Name') !!}
        {!! Form::text('client_name',$testimonial->client_name,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('client_image','Client Image') !!}
        {!! Form::file('client_image',['class'=>'form-control']) !!}
        @if(!empty($testimonial->client_image))
          <img src="{{asset('uploads/testimonials/'.$testimonial->client_image)}}" style="width:50px;height: 50px;" />
        @endif
     </div>
     <div class="form-group">
        {!! Form::label('client_city','Client City') !!}
        {!! Form::text('client_city',$testimonial->client_city,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('client_comment','Client Comment') !!}
        {!! Form::textarea('client_comment',$testimonial->client_comment,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('photo','Photo') !!}
        {!! Form::file('photo',['class'=>'form-control']) !!}
        @if(!empty($testimonial->photo))
          <img src="{{asset('uploads/testimonials/'.$testimonial->photo)}}" style="width:50px;height: 50px;" />
        @endif
     </div>
  
     {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection