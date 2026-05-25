<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mandatory_disclosure', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_school')->nullable();
            $table->string('affiliation')->nullable();
            $table->string('school_code')->nullable();
            $table->text('address')->nullable();
            $table->string('principal')->nullable();
            $table->string('school_email')->nullable();
            $table->string('school_contact')->nullable();
            $table->string('doc_affiliation')->nullable();
            $table->string('doc_trust')->nullable();
            $table->string('doc_noc')->nullable();
            $table->string('doc_rte')->nullable();
            $table->string('doc_building_safety')->nullable();
            $table->string('doc_fire_safety')->nullable();
            $table->string('doc_deo_cerificate')->nullable();
            $table->string('doc_water_health_sanitation')->nullable();
            $table->string('land_certificate')->nullable();
            $table->string('fee_structure')->nullable();
            $table->string('academic_calendar')->nullable();
            $table->string('smc')->nullable();
            $table->string('pta')->nullable();
            $table->string('board_result')->nullable();
            $table->string('total_teachers')->nullable();
            $table->string('pgt')->nullable();
            $table->string('tgt')->nullable();
            $table->string('prt')->nullable();
            $table->string('teacher_section_ratio')->nullable();
            $table->string('special_education')->nullable();
            $table->string('counsellor_wellness')->nullable();
            $table->string('campus_area')->nullable();
            $table->string('class_rooms')->nullable();
            $table->string('laboratories')->nullable();
            $table->string('internet')->nullable();
            $table->string('girls_toilets')->nullable();
            $table->string('boys_toilets')->nullable();
            $table->string('inspection_video')->nullable();
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
        Schema::dropIfExists('mandatory_disclosure');
    }
};
