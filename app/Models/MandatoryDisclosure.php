<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MandatoryDisclosure extends Model
{
    use HasFactory;
    protected $table = 'mandatory_disclosure';
    protected $fillable = [
        'name_of_school',
        'affiliation',
        'school_code',
        'address',
        'principal',
        'school_email',
        'school_contact',
        'doc_affiliation',
        'doc_trust',
        'doc_noc',
        'doc_rte',
        'doc_building_safety',
        'doc_fire_safety',
        'doc_deo_cerificate',
        'doc_water_health_sanitation',
        'land_certificate',
        'cbse_saras',
        'fee_structure',
        'academic_calendar',
        'smc',
        'pta',
        'board_result',
        'total_teachers',
        'pgt',
        'tgt',
        'prt',
        'teacher_section_ratio',
        'special_education',
        'counsellor_wellness',
        'campus_area',
        'class_rooms',
        'laboratories',
        'internet',
        'girls_toilets',
        'boys_toilets',
        'inspection_video',

    ];
}
