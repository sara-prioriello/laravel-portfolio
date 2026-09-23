<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->name = fake()->sentence(3);
            $newProject->description = fake()->paragraph(2);
            $newProject->customer = fake()->company();
            $newProject->period = fake()->date();
            $newProject->category_id = rand(1, 5); // Assuming you have 5 categories seeded
            $newProject->save();
        }
    }
}
