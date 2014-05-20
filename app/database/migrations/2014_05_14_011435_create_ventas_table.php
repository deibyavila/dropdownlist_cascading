<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ventas', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id');
            $table->bigInteger('id_client');
            $table->string('full_name');
            $table->string('email');
            $table->string('address');
            $table->string('ciudad');
            $table->bigInteger('celular_phone');
            $table->integer('phone');
			$table->timestamps();			
           // $table->foreign('user_id')->references('id')->on('users');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ventas');
	}

}
