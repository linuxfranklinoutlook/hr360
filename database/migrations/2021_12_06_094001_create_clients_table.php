<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_id')->nullable();
            $table->string('client_owner_name')->nullable();
            $table->string('client_owner_email')->nullable();
            $table->string('client_owner_number')->nullable();
            $table->string('address')->nullable();
            $table->string('client_contact_person')->nullable();
            $table->string('client_contact_number')->nullable();
            $table->string('client_contact_email')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('clients');
    }
}
