@extends('admin.index')
@section('title')
project-details
@endsection

@section('sub_title')
project-details Edit
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
    {!! Form::open(['url'=>aurl('project-details/'.$project->id),'method'=>'put','files'=>true ]) !!}
   
    <div class="form-group">
        {!! Form::label('project_id','project') !!}
        {!! Form::select('project_id',App\Models\Project::pluck('name','id'),$project->project_id,['class'=>'form-control','placeholder'=>'Pleas Choose project']) !!}
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

@push('js')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

@endpuch()

@endsection