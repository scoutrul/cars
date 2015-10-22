<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCtypeIdToCompanies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companies', function(Blueprint $table)
		{
			$table->integer('ctype_id')->unsigned()->after('type_id')->nullable();
			$table->foreign('ctype_id')->references('id')->on('ctypes')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('companies', function(Blueprint $table)
		{
			$table->dropForeign('ctype_id');
			$table->dropColumn('ctype_id');
		});
	}

}
