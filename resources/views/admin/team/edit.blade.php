@extends('admin.index')
@section('title')
    Categories
@endsection

@section('sub_title')
  Category Edit
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
    {!! Form::open(['url'=>aurl('team/'.$team->id),'method'=>'put','files'=>true ]) !!}
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',$team->name,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('job','Job') !!}
        {!! Form::text('job',$team->job,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('facebook','Facebook') !!}
        {!! Form::text('facebook',$team->facebook,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('twitter','Twitter') !!}
        {!! Form::text('twitter',$team->twitter ,['class'=>'form-control']) !!}
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