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
        Schema::create('transfer_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('admission_number')->index();
            $table->string('student_name');
            $table->string('father_name');
            $table->string('session');          // e.g. "2023-24"
            $table->string('tc_file_path');     // storage path of scanned PDF
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_certificates');
    }
};
