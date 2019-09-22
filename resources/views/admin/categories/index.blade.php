@extends('admin.index')
@section('title')
    Categories
@endsection
@section('sub_title')
   Category List
@endsection
@section('content')
<div class="box">
  <div class="box-header">
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  <div class="col-xs-12">
       <div class="table-responsive">
    {!! Form::open(['id'=>'form_data','url'=>aurl('categories/destroy/all'),'method'=>'delete']) !!}
    {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover  table-bordered'],true) !!}
    {!! Form::close() !!}
</div>
</div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


<!-- Modal -->
<div id="mutlipleDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">

        <div class="alert alert-danger">
        	<div class="empty_record hidden">
        	<h4>Please Check Some Records </h4>
        	</div>
        	<div class="not_empty_record hidden">
        	<h4>Are You Sure Delete Items <span class="record_count"></span> ? </h4>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<div class="empty_record hidden">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      	</div>
      	<div class="not_empty_record hidden">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <input type="submit"  value="Yes"  class="btn btn-danger del_all" />
        </div>
      </div>
    </div>
  </div>
</div>


@push('js')
<script> delete_all()</script>
{!! $dataTable->scripts() !!}

@endpush

@endsection