@extends('admin.index')
@section('title')
Sliders
@endsection

@section('sub_title')
Slider Edit
@endsection

@section('back')
  <li><a href="{{aurl('sliders')}}" class="btn btn-primary">Back</a></li>
@endsection
@section('content')
<div class="box">
  <div class="box-header">
  </div>
   <!-- /.box-header -->
   <div class="box-body">
    {!! Form::open(['url'=>aurl('sliders/'.$slider->id),'method'=>'put','files'=>true ]) !!}
     <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::textarea('title',$slider->title,['class'=>'form-control','id'=>'summernote']) !!}
        {!! Form::label('title',' Please Sellect All Wordes And Choose Style->Header1') !!}
     </div>
     <div class="form-group">
        {!! Form::label('image','Image') !!}
        {!! Form::file('image',['class'=>'form-control']) !!}
        @if(!empty($slider->image))
          <img src="{{asset('uploads/slider/'.$slider->image)}}" style="width:50px;height: 50px;" />
        @endif
     </div>
     {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


@push('js')

  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endpush

@endsection