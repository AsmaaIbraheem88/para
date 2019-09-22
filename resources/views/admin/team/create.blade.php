@extends('admin.index')
@section('title')
Categories
@endsection
@section('sub_title')
   Category Create
@endsection
@section('back')
  <li><a href="{{aurl('team')}}" class="btn btn-primary">Back</a></li>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('team'),'files'=>true]) !!}
     <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('job','Job') !!}
        {!! Form::text('job',old('job'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('facebook','Facebook') !!}
        {!! Form::text('facebook',old('facebook'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('twitter','Twitter') !!}
        {!! Form::text('twitter',old('twitter'),['class'=>'form-control']) !!}
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

@endsection