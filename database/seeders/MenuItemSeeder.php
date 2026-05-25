<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        // Wipe existing menu items and restart IDs cleanly
        MenuItem::truncate();

        $structure = [
            ['name' => 'Home',             'url' => '/',        'children' => []],
            ['name' => 'About',            'url' => null,       'children' => [
                ['name' => 'About D-BELS',        'url' => 'about/about-d-bels'],
                ['name' => 'Mission & Vision',     'url' => 'about/mission-vision'],
                ['name' => "Principal's Message",  'url' => 'about/principal-message'],
                ['name' => 'School Rules',         'url' => 'about/school-rules'],
            ]],
            ['name' => 'Academics',        'url' => null,       'children' => [
                ['name' => 'Academic Overview',    'url' => 'academics/academic-overview'],
                ['name' => 'Academic Programmes',  'url' => 'academic/academic-programmes'],
                ['name' => 'Resource List',        'url' => '/resource-list'],
            ]],
            ['name' => 'Beyond Academics', 'url' => null,       'children' => [
                ['name' => 'Extracurricular Activities', 'url' => 'beyond-academics/extra-curricular-activities'],
                ['name' => 'Sports & Games',             'url' => 'beyond-academics/sports-games'],
                ['name' => 'STREAM',                     'url' => 'beyond-academics/stream'],
                ['name' => 'Experiential Learning',      'url' => 'beyond-academics/experiential-learning'],
                ['name' => 'Y-Hub',                      'url' => 'beyond-academics/y-hub'],
                ['name' => 'WOSSETS',                    'url' => 'beyond-academics/wossets'],
            ]],
            ['name' => 'Admissions',       'url' => null,       'children' => [
                ['name' => 'Admissions Enquiry', 'url' => '/admissions'],
                ['name' => 'Download Brochure',  'url' => '/storage/assets/dbels-brochure.pdf'],
            ]],
            ['name' => 'Facilities',       'url' => null,       'children' => [
                ['name' => 'Learning Resource Centre', 'url' => 'facilities/learning-resource-center'],
                ['name' => 'Infirmary',               'url' => 'facilities/infirmary'],
            ]],
            ['name' => 'Gallery',          'url' => null,       'children' => [
                ['name' => 'School Events',  'url' => '/gallery/school-events'],
                ['name' => 'Infrastructure', 'url' => '/gallery/infrastructure'],
                ['name' => 'Activities',     'url' => '/gallery/activities'],
                ['name' => 'News Clippings', 'url' => '/gallery/news-clippings'],
            ]],
            ['name' => 'Contact',          'url' => '/contact', 'children' => []],
        ];

        foreach ($structure as $order => $item) {
            $parent = MenuItem::create([
                'name'          => $item['name'],
                'url'           => $item['url'],
                'parent_id'     => null,
                'display_order' => $order + 1,
                'status'        => 'active',
            ]);

            foreach ($item['children'] as $childOrder => $child) {
                MenuItem::create([
                    'name'          => $child['name'],
                    'url'           => $child['url'],
                    'parent_id'     => $parent->id,
                    'display_order' => $childOrder + 1,
                    'status'        => 'active',
                ]);
            }
        }
    }
}
