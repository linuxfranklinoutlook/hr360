<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('personal_email');
			$table->string('phone_number');
			$table->string('emp_id')->unique()->nullable();
			$table->string('emp_type')->nullable();
			$table->string('location')->nullable();
			$table->string('status')->nullable();
			$table->longText('permanent_address')->nullable();
			$table->longText('current_address')->nullable();
			$table->unsignedBigInteger('user_id')->index();
			$table->longText('meta_data')->nullable();

			$table->string('bank_account_bank')->nullable();
			$table->string('bank_account_branch')->nullable();
			$table->string('bank_account_ifsc')->nullable();
			$table->string('bank_account_number')->nullable();
			$table->string('bank_account_name')->nullable();

			$table->date('date_of_birth')->nullable();
			$table->date('date_of_joining')->nullable();

			$table->string('blood_group')->nullable();
			$table->string('emergency_contact_name')->nullable();
			$table->string('emergency_contact_number')->nullable();
			$table->string('emergency_relationship')->nullable();
			$table->string('aadhar')->nullable();
			$table->string('pan')->nullable();
			$table->string('desigination')->nullable();
			$table->string('bank_account_micr')->nullable();
			$table->string('middle_name')->nullable();
			$table->string('gender');
			$table->longText('notes')->nullable();
			
            $table->softDeletes();
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate()->change();
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
