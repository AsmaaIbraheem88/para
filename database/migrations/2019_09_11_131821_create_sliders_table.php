<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidersTable extends Migration {

	public function up()
	{
		Schema::create('sliders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('image');
			$table->string('title')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('sliders');
	}
}