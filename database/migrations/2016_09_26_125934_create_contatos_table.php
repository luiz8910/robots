<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contatos', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('tel');
			$table->string('subject');
			$table->string('email');
			$table->string('msg');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contatos');
	}

}
