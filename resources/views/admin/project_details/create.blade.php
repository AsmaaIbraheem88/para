@extends('admin.index')
@section('title')
Projects
@endsection
@section('sub_title')
Project Create
@endsection
@section('back')
  <li><a href="{{aurl('project-details')}}" class="btn btn-primary">Back</a></li>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('project-details') ,'files'=>true ]) !!}
    
    <div class="form-group">
        {!! Form::label('project_id','project') !!}
        {!! Form::select('project_id',App\Models\Project::pluck('name','id'),old('project_id'),['class'=>'form-control','placeholder'=>'Pleas Choose project']) !!}
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