<?php

use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Social::class, 5)->create();
        \App\Project::all()->map(function ($p){
            $p->socials()->save(factory(\App\Social::class)->create());
            $p->socials()->save(factory(\App\Social::class)->create());
        });
    }
}
