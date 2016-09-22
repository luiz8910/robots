<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipes', function(Blueprint $table) {
            $table->increments('id');
			$table->string('img');
			$table->string('nome');
			$table->string('cargo');
			$table->string('facebook');
			$table->string('email');
			$table->string('skype');
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
		Schema::drop('equipes');
	}

}
