<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Faker\Generator as Faker;
class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //creo un array di nomi di tecnologie
        $technologies = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Vue.js', 'React', 'Node.js', 'Python', 'Django'];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->color = $faker->hexColor() ; //genero un colore casuale
            $newTechnology->save();
        }
    }
}
