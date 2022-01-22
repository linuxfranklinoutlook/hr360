<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeProjectTable extends Migration
{
    /**
     * Run the migrations. Pivot
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_project', function (Blueprint $table)
        {
            $table->foreignId('employees_id')->constrained();
            $table->foreignId('projects_id')->constrained();
                      $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
