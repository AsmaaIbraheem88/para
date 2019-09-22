<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('about_msg');
			$table->text('footer_msg')->nullable();
			$table->string('sitename');
			$table->string('years_exp')->nullable();
			$table->string('happy_clients')->nullable();
			$table->string('finished_projects')->nullable();
			$table->string('email');
			$table->string('phone');
			$table->string('fax')->nullable();
			$table->text('address');
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('instgram')->nullable();
			$table->string('linkedin')->nullable();
			$table->text('logo')->nullable();
			$table->text('icon')->nullable();
			$table->text('about_image');
			$table->text('about_video')->nullable();
			$table->enum('status', array('open', 'close'))->default('open');
			$table->longText('message_maintenance')->nullable();
			
			
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}