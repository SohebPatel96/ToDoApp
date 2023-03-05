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
        $categories = $this->getCategories();

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }

    /**
     * get list of categories
     * @return array
     */
    private function getCategories()
    {
        return [
            'Deep Work',
            'Shallow Work',
            'Chores',
            'Learning',
            'Mind Care',
            'Body Care',
            'People',
            'Next Week',
        ];
    }
}
