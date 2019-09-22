<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->text('image');
			$table->date('date')->nullable();
			$table->integer('category_id');
		});
	}

	public function down()
	{
		Schema::drop('projects');
	}
}