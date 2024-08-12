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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('employee_id')->primary();
            $table->uuid('division_id');
            $table->string('employee_photo');
            $table->string('employee_name', 50);
            $table->string('employee_phone', 15);
            $table->string('employee_position', 20);
            $table->timestamps();

            // Define FK
            $table->foreign('division_id')->references('division_id')->on('divisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
