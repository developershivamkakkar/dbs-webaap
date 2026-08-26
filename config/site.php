<?php

/**
 * Site configuration � single source of truth for this deployment.
 *
 * To deploy for a different school:
 *  1. Copy the project.
 *  2. Edit the values below.
 *  3. Replace brand assets under /public/storage/assets/.
 *  4. Done.
 */

return [

    // -- Identity -------------------------------------------------------------
    'name'          => 'DBS',
    'full_name'     => 'Dass & Brown World School',
    'tagline'       => 'Legacy Beckons...',
    'url'           => env('APP_URL'),

    // -- Assets (relative to public/) -----------------------------------------
    'logo'          => 'storage/assets/dbs-logo.webp',
    'logo_icon'     => 'storage/assets/dbs.webp',
    'favicon'       => 'storage/assets/dbs.webp',
    'og_image'      => 'storage/assets/dbs-logo.webp',

    // -- Contact ---------------------------------------------------------------
    'address' => [
        'line1'       => 'Dass & Brown World School',
        'line2'       => 'Hussainiwala Border Road, Basti Sunwan',
        'city'        => 'Ferozepur',
        'state'       => 'Punjab',
        'country'     => 'India',
        'postal_code' => '152001',
        'full'        => 'Dass & Brown World School, Hussainiwala Border Road, Basti Sunwan',
    ],

    'phone'            => '01632-248099',
    'email_admissions' => 'dbsfzr@gmail.com',
    'email_info'       => 'info@dassandbrownschool.com',
    'whatsapp'         => '9115992918',

    // -- Admissions -----------------------------------------------------------
    'admissions_badge' => 'Admissions Open 2026–27',

    // -- Social Media ----------------------------------------------------------
    'social' => [
        'facebook'  => 'https://www.facebook.com/dassnbrown/',
        'instagram' => 'https://www.instagram.com/dassnbrown/',
        'twitter'   => 'https://x.com/dassnbrown',
        'youtube'   => 'https://www.youtube.com/@dbelschd',
    ],

    // -- Admissions / Documents ------------------------------------------------
    'admissions_url'   => '',
    'brochure_url'     => '',
    'enquiry_url'      => '',
    'registration_url' => '',

    // -- Analytics (environment-specific � set in .env) ------------------------
    'google_analytics'   => env('GOOGLE_ANALYTICS_ID',   ''),
    'google_tag_manager' => env('GOOGLE_TAG_MANAGER_ID', ''),

    // -- Brand colours ---------------------------------------------------------
    'color_primary'   => '#8c0305',
    'color_secondary' => '#d2ae6d',
    'color_accent'    => '#d2ae6d',

    // -- SEO -------------------------------------------------------------------
    'meta_description' => 'Dass & Brown World School (D-Bels) is the best school in Ferozepur, Punjab, India.',

    'meta_keywords'    => 'Dass & Brown World School, D-Bels, best school in Ferozepur, Punjab, India, admissions open, world-class education, future-ready learning',

];
