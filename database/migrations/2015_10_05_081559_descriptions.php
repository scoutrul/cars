<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Descriptions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('makes', function(Blueprint $table){
            $table->text('description');
        });
        Schema::table('models', function(Blueprint $table){
            $table->text('description');
        });
        Schema::table('specs', function(Blueprint $table){
            $table->text('description');
        });
        Schema::table('pages', function(Blueprint $table){
            $table->text('description');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('makes', function(Blueprint $table){
            $table->dropColumn('description');
        });
        Schema::table('models', function(Blueprint $table){
            $table->dropColumn('description');
        });
        Schema::table('specs', function(Blueprint $table){
            $table->dropColumn('description');
        });
        Schema::table('pages', function(Blueprint $table){
            $table->dropColumn('description');
        });
	}

}
