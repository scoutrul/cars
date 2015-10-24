<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meta_tags', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('spec_id')->unsigned()->nullable();;
			$table->foreign('spec_id')->references('id')->on('specs')->onDelete('cascade');

			$table->integer('type_id')->unsigned()->nullable();;
			$table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

			$table->integer('make_id')->unsigned()->nullable();;
			$table->foreign('make_id')->references('id')->on('makes')->onDelete('cascade');

			$table->integer('model_id')->unsigned()->nullable();;
			$table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');

			$table->string('tags')->nullable();
			$table->text('description')->nullable();

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
		Schema::drop('meta_tags');
	}

}
