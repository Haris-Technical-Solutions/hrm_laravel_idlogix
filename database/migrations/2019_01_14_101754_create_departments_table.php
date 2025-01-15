<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('branch_id');
            // $table->string('name');
            // $table->integer('created_by');
            $table->string('department_name');
            $table->string('short_name');
            $table->string('hod');
            $table->tinyInteger('is_active')->default(0);
            $table->foreignId('project_id')->nullable()->constrained('projects');
            $table->foreignId('client_id')->nullable()->constrained('clients');            
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
        Schema::dropIfExists('departments');
    }
}
