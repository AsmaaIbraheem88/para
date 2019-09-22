@extends('admin.index')
@section('title')
Clients
@endsection
@section('sub_title')
Client Create
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
    {!! Form::open(['url'=>aurl('clients'),'files'=>true]) !!}
     <div class="form-group">
        {!! Form::label('name','name') !!}
        {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('logo','Logo') !!}
        {!! Form::file('logo',['class'=>'form-control']) !!}
     </div>
   
     {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@push('js')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endpush

@endsection