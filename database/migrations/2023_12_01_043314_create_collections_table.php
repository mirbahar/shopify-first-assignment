<?php

use App\Enums\Status;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collections', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->smallInteger('status_id')->default(Status::ACTIVE->value);
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
		Schema::drop('collections');
	}
};
