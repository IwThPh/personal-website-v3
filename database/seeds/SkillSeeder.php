<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\Skill::class, 30)->create();

        \App\Skill::create(['name' => 'Java']);
        \App\Skill::create(['name' => 'C']);
        \App\Skill::create(['name' => 'C++']);
        \App\Skill::create(['name' => 'SQL']);
        \App\Skill::create(['name' => 'Javascript']);
        \App\Skill::create(['name' => 'PHP']);
        \App\Skill::create(['name' => 'Laravel']);
        \App\Skill::create(['name' => 'Dart']);
        \App\Skill::create(['name' => 'Flutter']);
        \App\Skill::create(['name' => 'Git']);
        \App\Skill::create(['name' => 'UNIX Systems']);
        \App\Skill::create(['name' => 'Windows Systems']);
    }
}
