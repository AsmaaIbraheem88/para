@extends('admin.index')
@section('title')
    Sections
@endsection
@section('sub_title')
   Sections
@endsection
@section('content')
<div class="box">
  <div class="box-header">

           
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('sections')]) !!}
  
     <div class="form-group">
      {!! Form::label('team','Team') !!}
      {!! Form::select('team',array('1'=>'open','2'=>'close'),null,['class'=>'form-control']) !!}

      
    </div>
    <div class="form-group">
      {!! Form::label('clients','Clients') !!}
      {!! Form::select('clients',array('1'=>'open','2'=>'close'),null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('interesting','Interesting') !!}
      {!! Form::select('interesting',array('1'=>'open','2'=>'close'),null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('testimonials','Testimonials') !!}
      {!! Form::select('testimonials',array('1'=>'open','2'=>'close'),null,['class'=>'form-control']) !!}
    </div>
   
    {!! Form::submit('save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection

