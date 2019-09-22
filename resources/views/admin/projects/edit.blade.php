@extends('admin.index')
@section('title')
Projects
@endsection

@section('sub_title')
Project Edit
@endsection

@section('back')
  <li><a href="{{aurl('projects')}}" class="btn btn-primary">Back</a></li>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
  </div>
   <!-- /.box-header -->
   <div class="box-body">
    {!! Form::open(['url'=>aurl('projects/'.$project->id),'method'=>'put','files'=>true ]) !!}
     <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',$project->name,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('date','Date') !!}
        {!! Form::text('date',$project->date,['class'=>'form-control','placeholder'=>'2019-09-08']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('category_id','Category') !!}
        {!! Form::select('category_id',App\Models\Category::pluck('name','id'),$project->category_id,['class'=>'form-control','placeholder'=>'Pleas Choose Category']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('image','Image') !!}
        {!! Form::file('image',['class'=>'form-control']) !!}
        @if(!empty($project->image))
          <img src="{{asset('uploads/projects/'.$project->image)}}" style="width:50px;height: 50px;" />
        @endif
     </div>
   
     {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection