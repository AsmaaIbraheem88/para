<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->enum('team', array('open', 'close'))->default('open');
			$table->enum('interesting', array('open', 'close'))->default('open');
			$table->enum('clients', array('open', 'close'))->default('open');
			$table->enum('testimonials', array('open', 'close'))->default('open');
		
		});
	}

	public function down()
	{
		Schema::drop('sections');
	}
}