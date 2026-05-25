<?php

/**
 * Site configuration — single source of truth for this deployment.
 *
 * To deploy for a different school:
 *  1. Copy the project.
 *  2. Edit the values below.
 *  3. Replace brand assets under /public/storage/assets/.
 *  4. Done.
 */

return [

    // -- Identity -------------------------------------------------------------
    'name'          => 'DBELS',
    'full_name'     => 'Dass & Brown Experiential Learning School',
    'tagline'       => 'Legacy Beckons...',
    'url'           => env('APP_URL'),

    // -- Assets (relative to public/) -----------------------------------------
    'logo'          => 'storage/assets/dbs-logo.webp',
    'logo_icon'     => 'storage/assets/dbs.webp',
    'favicon'       => 'storage/assets/dbs.webp',
    'og_image'      => 'storage/assets/dbs-logo.webp',

    // -- Contact ---------------------------------------------------------------
    'address' => [
        'line1'       => 'Dass & Brown Experiential Learning School',
        'line2'       => 'Hussainiwala Border Road, Basti Sunwan',
        'city'        => 'Ferozepur City',
        'state'       => 'Punjab',
        'country'     => 'India',
        'postal_code' => '152001',
        'full'        => 'Dass & Brown Experiential Learning School, Hussainiwala Border Road, Basti Sunwan',
    ],

    'phone'            => '01632-248099',
    'email_admissions' => 'dbsfzr@gmail.com',
    'email_info'       => 'info@dassandbrownschool.com',
    'whatsapp'         => '9115992918',

    // -- Social Media ----------------------------------------------------------
    'social' => [
        'facebook'  => 'https://www.facebook.com/dbelschd',
        'instagram' => 'https://www.instagram.com/dbelschd',
        'linkedin'  => 'https://www.linkedin.com/company/dbelschd',
        'twitter'   => 'https://x.com/dbelschd',
        'youtube'   => 'https://www.youtube.com/@dbelschd',
    ],

    // -- Admissions / Documents ------------------------------------------------
    'admissions_url' => 'https://admissions.dassandbrownschool.com/',
    'brochure_url'   => '/brochures/dbels-brochure.pdf',

    // -- Google Maps -----------------------------------------------------------
    'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d27437.776806266076!2d76.850724!3d30.726212!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f933babb16cbf%3A0x3d75ae038c87404a!2sD-%20Bels%20(Dass%20%26%20Brown%20Experiential%20Learning%20School)!5e0!3m2!1sen!2sin!4v1734506744997!5m2!1sen!2sin',

    // -- Analytics (environment-specific — set in .env) ------------------------
    'google_analytics'   => env('GOOGLE_ANALYTICS_ID',   ''),
    'google_tag_manager' => env('GOOGLE_TAG_MANAGER_ID', ''),

    // -- Brand colours ---------------------------------------------------------
    'color_primary'   => '#8c0305',
    'color_secondary' => '#d2ae6d',
    'color_accent'    => '#d2ae6d',

    // -- SEO -------------------------------------------------------------------
    'meta_description' => 'Dass & Brown Experiential Learning School (D-Bels) is an innovative educational institution '
        . 'in Panchkula, Tricity Chandigarh — offering Finnish, entrepreneurship, legacy, and '
        . 'international pathways including Cambridge AS/A Level, IB Diploma, and ICSE.',

    'meta_keywords' => 'Best School in Chandigarh, Best School in Panchkula, D-BELS, Dass and Brown School, '
        . 'Top Schools Panchkula, ICSE School Chandigarh, Cambridge School Panchkula, '
        . 'International School Panchkula, Experiential Learning School',

];