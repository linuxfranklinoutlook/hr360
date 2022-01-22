<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();

			$table->string('asset_tag')->unique()->nullable();
			$table->string('manufacturer')->nullable();
			$table->string('model')->nullable();
			$table->string('asset_type')->nullable();
			$table->string('asset_color')->nullable();
			$table->string('serial_number'); 
			$table->string('purchase_date')->nullable();
			$table->string('purchase_amount')->nullable();
			$table->string('order_number')->nullable();
			$table->string('current_user')->nullable();
			$table->string('previous_user')->nullable();
			$table->string('due_date')->nullable();
			$table->string('condition_notes')->nullable();
			$table->string('host_name')->nullable();
			$table->string('processor')->nullable();
			$table->string('os_name')->nullable();
			$table->string('physical_memory')->nullable();
			$table->string('graphics_card')->nullable();
			$table->string('hard_disks')->nullable();
			$table->string('mac_address')->nullable();
			$table->string('enrolled_with_dcme')->nullable();
			$table->string('issued_date')->nullable();
			$table->softDeletes();
			$table->unsignedBigInteger('employee_id')->index();
			
            $table->timestamps();

			$table->foreign('employee_id')->references('id')->on('employees')->cascadeOnDelete()->cascadeOnUpdate()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
