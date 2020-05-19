<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Project::class, 5)->create();
        \App\Project::all()->map(function ($p){
            $p->images()->save(factory(\App\Image::class)->create());
            $p->images()->save(factory(\App\Image::class)->create());
            $p->images()->save(factory(\App\Image::class)->create());
            $p->skills()->save(\App\Skill::get()->random());
            $p->skills()->save(\App\Skill::get()->random());
            $p->skills()->save(\App\Skill::get()->random());
            $p->skills()->save(\App\Skill::get()->random());
            $p->skills()->save(\App\Skill::get()->random());
            $p->skills()->save(\App\Skill::get()->random());
        });
    }
}
