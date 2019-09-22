@extends('admin.index')
@section('title')
    Admins
@endsection

@section('sub_title')
  Admin Edit
@endsection

@section('back')
  <li><a href="{{aurl('admin')}}" class="btn btn-info">Back</a></li>
@endsection

@section('content')


<div class="box">
  <div class="box-header">
  </div>
   <!-- /.box-header -->
   <div class="box-body">
    {!! Form::open(['url'=>aurl('admin/'.$admin->id),'method'=>'put' ]) !!}
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',$admin->name,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::email('email',$admin->email,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('password_confirmation','Password Confirmation') !!}
        {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
     </div>
    
     
     {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->





@endsection