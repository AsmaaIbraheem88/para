<?php

namespace App\DataTables;

use App\Models\Testimonial;
use Yajra\DataTables\Services\DataTable;

class TestimonialDatatable extends DataTable {
	/**
	 * Build DataTable class.
	 *
	 * @param mixed $query Results from query() method.
	 * @return \Yajra\DataTables\DataTableAbstract
	 */
	public function dataTable($query) {
		return datatables($query)
			->addColumn('checkbox', 'admin.testimonials.btn.checkbox')
			->addColumn('edit', 'admin.testimonials.btn.edit')
			->addColumn('delete', 'admin.testimonials.btn.delete')
			->rawColumns([
				'edit',
				'delete',
				'checkbox',
			]);
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Testimonial $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query() {
		return Testimonial::query();
	}

	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\DataTables\Html\Builder
	 */
	public function html() {
		return $this->builder()
		            ->columns($this->getColumns())
			->minifiedAjax()
		//->addAction(['width' => '80px'])
		//->parameters($this->getBuilderParameters());
			->parameters([
				'dom'        => 'Blfrtip',
				'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50,'All Records']],
				'buttons'    => [
					[
					   'text' => '<i class="fa fa-plus"></i> Add', 'className' => 'btn btn-info', "action" => "function(){

						window.location.href = '".\URL::current()."/create';}"
					],
				
					['text' => '<i class="fa fa-trash"></i> Delete All', 'className' => 'btn btn-danger delBtn'],

				],
				'initComplete' => " function () {
		            this.api().columns([1,2,3]).every(function () {
		                var column = this;
		                var input = document.createElement(\"input\");
		                $(input).appendTo($(column.footer()).empty())
		                .on('keyup', function () {
		                    column.search($(this).val(), false, false, true).draw();
		                });
		            });
		        }",

				
			]);
	}

	/**
	 * Get columns.
	 *
	 * @return array
	 */
	protected function getColumns() {
		return [
			[
				'name'       => 'checkbox',
				'data'       => 'checkbox',
				'title'      => '<input type="checkbox" class="check_all" onclick="check_all()" />',
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			], 
			[
				'name'  => 'id',
				'data'  => 'id',
				'title' => '#',
			], [
				'name'  => 'client_name',
				'data'  => 'client_name',
				'title' => 'Client Name',
			], [
				'name'  => 'client_image',
				'data'  => 'client_image',
				'title' => 'Client Image',
			],[
				'name'  => 'client_city',
				'data'  => 'client_city',
				'title' => 'Client City',
			], [
				'name'  => 'photo',
				'data'  => 'photo',
				'title' => 'Photo',
			],  [
				'name'  => 'client_comment',
				'data'  => 'client_comment',
				'title' => 'Client Comment',
			], [
				'name'       => 'edit',
				'data'       => 'edit',
				'title'      => 'Edit',
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			], [
				'name'       => 'delete',
				'data'       => 'delete',
				'title'      => 'Delete',
				'exportable' => false,
				'printable'  => false,
				'orderable'  => false,
				'searchable' => false,
			],

		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename() {
		return 'testimonials'.date('YmdHis');
	}
}
