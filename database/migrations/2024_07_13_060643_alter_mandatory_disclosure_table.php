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
        Schema::table('mandatory_disclosure', function (Blueprint $table) {
            $table->string('cbse_saras')->nullable()->after('land_certificate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mandatory_disclosure', function (Blueprint $table) {
            $table->dropColumn('cbse_saras');
        });
    }
};
