<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::create(
            [
                'name' => 'Informations',
                'slug' => 'informations',
                'parent_id' => null,
            ],
            [
                'name' => 'Agenda',
                'slug' => 'agenda',
                'parent_id' => null,
            ],
            [
                'name' => 'Blogs',
                'slug' => 'blogs',
                'parent_id' => null,
            ]
        );
    }
}
