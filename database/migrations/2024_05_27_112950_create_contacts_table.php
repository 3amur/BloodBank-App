<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('subject');
			$table->text('message');
			$table->integer('client_id')->unsigned();
			$table->string('name');
			$table->string('email');
			$table->string('phone');
		});
	}

	public function down()
	{
		Schema::dropIfExists('contacts');
	}
}