<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalhesContatosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detalhes_contatos', function(Blueprint $table) {
            $table->increments('id');
			$table->string('topic');
			$table->string('description');
            $table->string('address');
            $table->string('city');
            $table->string('zipCode');
            $table->string('telOwner');
            $table->string('celOwner');
            $table->string('emailOwner');
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
		Schema::drop('detalhes_contatos');
	}

}
