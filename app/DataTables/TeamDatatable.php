<?php

namespace App\DataTables;

use App\Models\Team;
use Yajra\DataTables\Services\DataTable;

class TeamDatatable extends DataTable {
	/**
	 * Build DataTable class.
	 *
	 * @param mixed $query Results from query() method.
	 * @return \Yajra\DataTables\DataTableAbstract
	 */
	public function dataTable($query) {
		return datatables($query)
			->addColumn('checkbox', 'admin.team.btn.checkbox')
			->addColumn('edit', 'admin.team.btn.edit')
			->addColumn('delete', 'admin.team.btn.delete')
			->rawColumns([
				'edit',
				'delete',
				'checkbox',
			]);
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Team $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query() {
		return Team::query();
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
				'name'  => 'name',
				'data'  => 'name',
				'title' => 'name',
			], [
				'name'  => 'job',
				'data'  => 'job',
				'title' => 'Job',
			], [
				'name'  => 'image',
				'data'  => 'image',
				'title' => 'Image',
			],  [
				'name'  => 'facebook',
				'data'  => 'facebook',
				'title' => 'Facebook',
			],  [
				'name'  => 'twitter',
				'data'  => 'twitter',
				'title' => 'Twitter',
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
		return 'teams'.date('YmdHis');
	}
}
