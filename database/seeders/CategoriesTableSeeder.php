<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //tipologia di lavoro: sito vetrina, e-commerce, app mobile, identità visiva, gestionale.
        $categories = [ 'Sito vetrina', 'E-commerce', 'App mobile', 'Identità visiva', 'Gestionale'];
        
        foreach ($categories as $category) {
            $newCategory = new \App\Models\Category();
            $newCategory->name = $category;
            $newCategory->description = $faker->sentence();
            $newCategory->save();
        }
      
}
}