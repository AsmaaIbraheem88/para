
@extends('admin.index')
@section('title')
    Admins
@endsection
@section('sub_title')
   Change Password
@endsection
@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('change-password')]) !!}
     <div class="form-group">
        {!! Form::label('old-password','Old Password') !!}
        {!! Form::password('old-password',['class'=>'form-control']) !!}
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