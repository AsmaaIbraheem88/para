<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamsTable extends Migration {

	public function up()
	{
		Schema::create('teams', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('job');
			$table->text('image')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('teams');
	}
}