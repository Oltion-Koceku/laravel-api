<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technologie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProjectTechnologieSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 200; $i++) {
            $project = Project::inRandomOrder()->first();

            $technologie = Technologie::inRandomOrder()->first()->id;

            $project->technologie()->attach($technologie);
        }
    }
}
