<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectDetailsTable extends Migration {

	public function up()
	{
		Schema::create('project_details', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('image');
			$table->integer('project_id');
		});
	}

	public function down()
	{
		Schema::drop('project_details');
	}
}