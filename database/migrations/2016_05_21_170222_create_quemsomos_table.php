<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuemsomosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quemsomos', function(Blueprint $table) {
            $table->increments('id');
			$table->string("description");
			$table->string("whyUs");
			$table->string('ourValues');
			$table->string('vision');
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
		Schema::drop('quemsomos');
	}

}
