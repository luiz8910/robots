<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionariosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questionarios', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->text('pergunta1');
			$table->text('pergunta2');
			$table->text('pergunta3');
			$table->text('pergunta4');
			$table->text('pergunta5');
			$table->text('pergunta6');
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
		Schema::drop('questionarios');
	}

}
