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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('employee_id')->nullable()
                ->constrained('employees')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreignId('location_id')->nullable()
                ->constrained('locations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        
            $table->foreignId('shift_id')->nullable()
                ->constrained('shifts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
