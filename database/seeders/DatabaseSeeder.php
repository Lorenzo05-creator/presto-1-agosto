<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Elettronica',
            'Abbigliamento',
            'Casa',
            'Sport',
            'Libri',
            'Auto',
            'Giardinaggio',
            'Animali',
            'Collezionismo',
            'Altro'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
