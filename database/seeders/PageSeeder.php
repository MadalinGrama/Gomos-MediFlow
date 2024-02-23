<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Adaugă înregistrări fictive în baza de date pentru modelul Page
        Page::create([
            'title' => 'Home',
            'content' => 'Conținutul paginii home...',
            'template' => 'home',
        ]);

        Page::create([
            'title' => 'Services',
            'content' => 'Conținutul paginii Services...',
            'template' => 'services',
        ]);

        Page::create([
            'title' => 'About',
            'content' => 'Conținutul paginii About...',
            'template' => 'about',
        ]);

        Page::create([
            'title' => 'Contact',
            'content' => 'Conținutul paginii Contact...',
            'template' => 'contact',
        ]);
        
        

        
    }
}
