<?php

namespace Database\Seeders;

use App\Functions\Helper;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ProjectSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 200; $i++) {
            $new_project = new Project();

            $new_project->title = $faker->sentence(3);
            $new_project->slug = Helper::makeSlug($new_project->title, Project::class);
            $new_project->description = $faker->paragraph(4);
            $new_project->type_id = Type::inRandomOrder()->first()->id;
            $new_project->save();
        }
    }
}
