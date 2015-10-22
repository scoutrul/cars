<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDisplayToCtypes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ctypes', function(Blueprint $table)
		{
			$table->boolean('display')->default(true)->after('name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ctypes', function(Blueprint $table)
		{
			$table->dropColumn('display');
		});
	}

}
