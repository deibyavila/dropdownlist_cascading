<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetalleVentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detalleventas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('venta_id')->unsigned()->index();
			$table->bigInteger('valor_total');
			$table->string('modelo');
			$table->integer('modelo_anuo');

			$table->timestamps();
			$table->foreign('venta_id')->references('id')->on('ventas');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detalleventas');
	}

}
