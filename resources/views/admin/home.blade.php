
@extends('admin.index')
@section('title')
  Dashboard
@endsection
@section('sub_title')
  Dashboard
@endsection

@inject('user','App\User')
<?php
    $usersCount = $user->all()->count();
?>

@section('content')
        <!-- Info boxes -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
        

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                Hello  {{ admin()->user()->name}}
            </div>
        </div>
    </div>
</div>
<div class="row">
   
   
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Users Count</span>
                <span class="info-box-number">{{$usersCount}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>


    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>


</div>
<!-- /.row -->
@endsection
