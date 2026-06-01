<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable()
                  ->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });

        // Seed defaults
        $defaults = [
            // Floating buttons
            'lp_brochure_btn_label'  => 'Download Brochure',
            'lp_register_btn_label'  => 'Register Now',

            // Admissions CTA section
            'lp_cta_badge'    => 'Admissions Open 2026-27',
            'lp_cta_title'    => 'Give Your Child the Education They Deserve',
            'lp_cta_subtitle' => 'Dass & Brown Experiential Learning School is now accepting applications. Secure your child\'s future with world-class, future-ready learning.',

            // Stats (6 stats – num or icon + label)
            'lp_stat_1_num'   => '36+',
            'lp_stat_1_label' => 'National Awards & Prestigious Recognitions',
            'lp_stat_2_icon'  => 'fas fa-graduation-cap',
            'lp_stat_2_label' => 'CBSE & Cambridge International Curricula',
            'lp_stat_3_icon'  => 'fab fa-microsoft',
            'lp_stat_3_label' => 'Proud Microsoft Showcase School',
            'lp_stat_4_icon'  => 'fas fa-robot',
            'lp_stat_4_label' => 'Advanced AI, Robotics & STEAM Innovation Labs',
            'lp_stat_5_num'   => '1000+',
            'lp_stat_5_label' => 'Young Leaders Inspired & Empowered',
            'lp_stat_6_icon'  => 'fas fa-globe',
            'lp_stat_6_label' => 'International Exposure & Global Exchange Opportunities',

            // Explore / About section
            'lp_explore_heading' => 'SHAPING FUTURE LEADERS THROUGH INNOVATION & TECHNOLOGY',
            'lp_explore_text'    => 'Located in the serene environment of Panchkula (Tri City), Dass & Brown Experiential Learning School is designed to cultivate competent & conscientious individuals who can think ahead of their times. D-Bels is designed with modern architecture & is going to be the first of its kind, centrally air-conditioned, state-of-the-art, Wi-Fi enabled, digitally equipped campus.',

            // Page head
            'lp_page_title'          => 'Best School in Panchkula & Tricity Chandigarh',
            'lp_meta_description'    => '',
        ];

        foreach ($defaults as $key => $value) {
            DB::table('landing_settings')->insert([
                'key'        => $key,
                'value'      => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_settings');
    }
};
