<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MetaTitle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('makes', function(Blueprint $table){
            $table->string('meta_title');
        });
        Schema::table('models', function(Blueprint $table){
            $table->string('meta_title');
        });
        Schema::table('specs', function(Blueprint $table){
            $table->string('meta_title');
        });
        Schema::table('pages', function(Blueprint $table) {
            $table->string('meta_title');
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
            $table->dropColumn('meta_title');
        });
        Schema::table('models', function(Blueprint $table){
            $table->dropColumn('meta_title');
        });
        Schema::table('specs', function(Blueprint $table){
            $table->dropColumn('meta_title');
        });
        Schema::table('pages', function(Blueprint $table) {
            $table->dropColumn('meta_title');
        });
	}

}
