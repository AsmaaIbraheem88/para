@extends('admin.index')
@section('title')
Testimonials
@endsection
@section('sub_title')
Testimonial Create
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
    {!! Form::open(['url'=>aurl('testimonials'),'files'=>true]) !!}
     <div class="form-group">
        {!! Form::label('client_name','Client Name') !!}
        {!! Form::text('client_name',old('client_name'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('client_image','Client Image') !!}
        {!! Form::file('client_image',['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('client_city','Client City') !!}
        {!! Form::text('client_city',old('client_city'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('client_comment','Client Comment') !!}
        {!! Form::textarea('client_comment',old('client_comment'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('photo','Photo') !!}
        {!! Form::file('photo',['class'=>'form-control']) !!}
     </div>
   
     {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@push('js')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endpush

@endsection