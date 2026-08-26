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


    // -- Google Maps -----------------------------------------------------------
    'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6843.300736527657!2d74.589186!3d30.952328!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919c2096f2c2fbb%3A0xe1dcf838799b421!2sDass%20%26%20Brown%20World%20School!5e0!3m2!1sen!2sus!4v1787729763890!5m2!1sen!2sus',

    // -- Analytics (environment-specific � set in .env) ------------------------
    'google_analytics'   => env('GOOGLE_ANALYTICS_ID',   ''),
    'google_tag_manager' => env('GOOGLE_TAG_MANAGER_ID', ''),

    // -- Brand colours ---------------------------------------------------------
    'color_primary'   => '#8c0305',
    'color_secondary' => '#d2ae6d',
    'color_accent'    => '#d2ae6d',

    // -- SEO -------------------------------------------------------------------
    'meta_description' => 'Dass & Brown World School (D-Bels) is the best school in Ferozepur, Punjab, India. '
        . 'An innovative educational institution offering Finnish, entrepreneurship, legacy, and '
        . 'international pathways including Cambridge AS/A Level, IB Diploma, and ICSE.',

    'meta_keywords' => 'Best School in Ferozepur, Best School in Punjab, D-BELS, Dass and Brown World School, '
        . 'Top Schools Ferozepur, Best School in India, ICSE School Ferozepur, Cambridge School Ferozepur, '
        . 'International School Ferozepur, World School, Experiential Learning School',

];
