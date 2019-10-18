<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param \Faker\Generator $faker
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
//        factory(Category::class,20)->create();

        Category::truncate();

        for ($i = 0; $i < 20; $i++) {

            $categoryName = rtrim($faker->sentence(3), '.');

            Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);

        }
    }
}
