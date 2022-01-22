<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customables', function (Blueprint $table) {
            $table->primary(['custom_field_id','customable_id','customable_type'], 'custom_key_index');
			// $table->unsignedBigInteger('post_id');
			$table->unsignedBigInteger('custom_field_id');
			$table->unsignedBigInteger('customable_id');
			$table->string('customable_type');
			$table->longText('field_value')->nullable();
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
        Schema::dropIfExists('customables');
    }
}
