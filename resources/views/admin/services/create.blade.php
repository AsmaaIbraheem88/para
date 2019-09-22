@extends('admin.index')
@section('title')
Services
@endsection
@section('sub_title')
Service Create
@endsection
@section('back')
  <li><a href="{{aurl('services')}}" class="btn btn-primary">Back</a></li>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
    
  </div>

  
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('services'),'files'=>true]) !!}
     <div class="form-group">
        {!! Form::label('name','name') !!}
        {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('description','Description') !!}
        {!! Form::textarea('description',old('description'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('image','Image') !!}
        {!! Form::file('image',['class'=>'form-control']) !!}
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