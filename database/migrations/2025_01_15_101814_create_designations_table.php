<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // // $table->integer('department_id');
            // $table->string('name');
            // $table->integer('created_by');
            // $table->timestamps();

            $table->id();
            $table->string('designation_title');
            $table->foreignId('project_id')->nullable()->constrained('projects');
            $table->foreignId('client_id')->constrained('clients');
            $table->tinyInteger('is_active')->default(0);
            $table->integer('created_by');
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
        Schema::dropIfExists('designations');
    }
}
