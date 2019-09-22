<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestimonialsTable extends Migration {

	public function up()
	{
		Schema::create('testimonials', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('client_name')->nullable();
			$table->text('client_image')->nullable();
			$table->text('photo')->nullable();
			$table->string('client_city')->nullable();
			$table->text('client_comment');
		});
	}

	public function down()
	{
		Schema::drop('testimonials');
	}
}