<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->index();
            $table->string('project_name');
            $table->string('project_manager')->nullable();
            $table->string('task_type')->nullable();
            $table->string('description')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('requested_on')->nullable();
            $table->string('effort_estimation_by')->nullable();
            $table->string('estimated_hours')->nullable();
            $table->boolean('deployed_on_staging')->nullable();
            $table->boolean('deployed_on_production')->nullable();
            $table->string('delivered_on')->nullable();
            $table->string('current_status')->nullable();
            $table->string('developers')->nullable();
            $table->string('designers')->nullable();
            $table->string('notes')->nullable();
            $table->softDeletes();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
}
