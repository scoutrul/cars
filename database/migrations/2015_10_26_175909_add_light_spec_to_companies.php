<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLightSpecToCompanies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('specs', function(Blueprint $table)
		{
			$table->boolean('light_spec')->default(0)->after('title');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('specs', function(Blueprint $table)
		{
			$table->dropColumn('light_spec');
		});
	}

}
