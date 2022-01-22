<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_structures', function (Blueprint $table) {
            $table->id();
			// $table->string('full_name')->nullable();
			$table->string('ctc')->nullable();
			$table->string('basic')->nullable();
			$table->string('hra')->nullable();
			$table->string('medical')->nullable();
			$table->string('broadband')->nullable();
			// $table->string('other_allowances')->nullable();
			// $table->string('pf')->nullable();
			// $table->string('esi')->nullable();
			$table->string('pt')->nullable();
			// $table->string('others')->nullable();
			// $table->string('total_earnings')->nullable();
			// $table->string('total_deductions')->nullable();
            $table->string('gross_pay')->nullable(); 
			$table->string('notes')->nullable();
			$table->string('net_pay')->nullable();
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
        Schema::dropIfExists('salary_structures');
    }
}
