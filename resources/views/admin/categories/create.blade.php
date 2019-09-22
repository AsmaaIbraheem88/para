@extends('admin.index')
@section('title')
Categories
@endsection
@section('sub_title')
   Category Create
@endsection
@section('back')
  <li><a href="{{aurl('categories')}}" class="btn btn-primary">Back</a></li>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('categories')]) !!}
     <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
     </div>
   
     {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection