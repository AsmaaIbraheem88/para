@extends('admin.index')
@section('title')
Clients
@endsection

@section('sub_title')
Client Edit
@endsection

@section('back')
  <li><a href="{{aurl('clients')}}" class="btn btn-primary">Back</a></li>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
  </div>
   <!-- /.box-header -->
   <div class="box-body">
    {!! Form::open(['url'=>aurl('clients/'.$client->id),'method'=>'put','files'=>true ]) !!}
     <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',$client->name,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('logo','Logo') !!}
        {!! Form::file('logo',['class'=>'form-control']) !!}
        @if(!empty($client->logo))
          <img src="{{asset('uploads/clients/'.$client->logo)}}" style="width:50px;height: 50px;" />
        @endif
     </div>
     {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection