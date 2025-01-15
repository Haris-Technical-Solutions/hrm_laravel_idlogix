<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->decimal('longitude', 10, 7)->nullable(); 
            $table->decimal('latitude', 10, 7)->nullable();  
            $table->decimal('allowed_radius_in_meters', 10, 2)->nullable(); 
            $table->foreignId('client_id')->constrained('clients');
            $table->tinyInteger('is_active')->default(0);
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
