@extends('admin.index')
@section('title')
Services
@endsection

@section('sub_title')
Service Edit
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
    {!! Form::open(['url'=>aurl('services/'.$service->id),'method'=>'put','files'=>true ]) !!}
     <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',$service->name,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('description','Description') !!}
        {!! Form::textarea('description',$service->description,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('image','Image') !!}
        {!! Form::file('image',['class'=>'form-control']) !!}
        @if(!empty($service->image))
          <img src="{{asset('uploads/services/'.$service->image)}}" style="width:50px;height: 50px;" />
        @endif
     </div>
     {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection