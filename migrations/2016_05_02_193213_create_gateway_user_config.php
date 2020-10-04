<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Larabookir\Gateway\PortAbstract;
use Larabookir\Gateway\GatewayResolver;
use Larabookir\Gateway\Enum;

class CreateGatewayTransactionsTable extends Migration
{
	function getTable()
	{
		return config('gateway.table', 'gateway_config_saman');
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
       
	    
		Schema::create($this->getTable(), function (Blueprint $table) {
			$table->engine = "innoDB";
			$table->unsignedBigInteger('id', true);
			$table->unsignedBigInteger('user_id');
			$table->enum('port', (array) Enum::getIPGs());
			$table->string('getwayname', 15, 2);
			$table->string('ref_id', 100)->nullable();
			$table->string('tracking_code', 50)->nullable();
			$table->string('card_number', 50)->nullable();
			$table->string('ip', 20)->nullable();
			$table->timestamp('payment_date')->nullable();
			$table->nullableTimestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->getTable());
	}
}
