@extends('admin.index')
@section('title')
    Settings
@endsection
@section('sub_title')
   Settings
@endsection
@section('content')
<div class="box">
  <div class="box-header">

           
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('settings'),'files'=>true]) !!}
    <div class="form-group">
      {!! Form::label('sitename','Sitename') !!}
      {!! Form::text('sitename',$settings->sitename,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('years_exp','Years Exp') !!}
      {!! Form::text('years_exp',$settings->years_exp,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('happy_clients','Happy Clients') !!}
      {!! Form::text('happy_clients',$settings->happy_clients,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('finished_projects','Finished Projects') !!}
      {!! Form::text('finished_projects',$settings->finished_projects,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('phone','Phone') !!}
      {!! Form::text('phone',$settings->phone,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('fax','Fax') !!}
      {!! Form::text('fax',$settings->fax,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('address','Address') !!}
      {!! Form::textarea('address',$settings->address,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('email','email') !!}
      {!! Form::email('email',$settings->email,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('logo','Logo') !!}
      {!! Form::file('logo',['class'=>'form-control']) !!}
      @if(!empty($settings->logo))
       <img src="{{asset('uploads/settings/'.$settings->logo)}}" style="width:50px;height: 50px;" />
      @endif
    </div>
    <div class="form-group">
      {!! Form::label('icon','Icon') !!}
      {!! Form::file('icon',['class'=>'form-control']) !!}

      @if(!empty($settings->icon))
        <img src="{{asset('uploads/settings/'.$settings->icon)}}" style="width:50px;height: 50px;" />
      @endif
    </div>
    <div class="form-group">
      {!! Form::label('about_image','About Image') !!}
      {!! Form::file('about_image',['class'=>'form-control']) !!}

      @if(!empty($settings->about_image))
        <img src="{{asset('uploads/settings/'.$settings->about_image)}}" style="width:50px;height: 50px;" />
      @endif
    </div>
    <div class="form-group">
      {!! Form::label('about_video','Video Link') !!}
      {!! Form::text('about_video',$settings->about_video,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('footer_msg','Footer Msg') !!}
      {!! Form::textarea('footer_msg',$settings->footer_msg,['class'=>'form-control summernote']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('about_msg','About Msg') !!}
      {!! Form::textarea('about_msg',$settings->about_msg,['class'=>'form-control summernote']) !!}
    </div>
     <div class="form-group">
      {!! Form::label('status','Status') !!}
      {!! Form::select('status',array('1'=>'open','2'=>'close'),null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('message_maintenance','Message Maintenance') !!}
      {!! Form::textarea('message_maintenance',$settings->message_maintenance,['class'=>'form-control summernote']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('facebook','Facebook') !!}
      {!! Form::text('facebook',$settings->facebook,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('twitter','Twitter') !!}
      {!! Form::text('twitter',$settings->twitter,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('instgram','Instgram') !!}
      {!! Form::text('instgram',$settings->instgram,['class'=>'form-control']) !!}
    </div> <div class="form-group">
      {!! Form::label('linkedin','Linkedin') !!}
      {!! Form::text('linkedin',$settings->linkedin,['class'=>'form-control']) !!}
    </div>
    
    {!! Form::submit('save',['class'=>'btn btn-primary']) !!}
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
        $('.summernote').summernote();
    });
  </script>
@endpush

@endsection

