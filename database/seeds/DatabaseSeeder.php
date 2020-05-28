<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SkillSeeder::class);
        // $this->call(ExperienceSeeder::class);
        // $this->call(ImageSeeder::class);
        // $this->call(ProjectSeeder::class);
        $this->call(SocialSeeder::class);
    }
}
