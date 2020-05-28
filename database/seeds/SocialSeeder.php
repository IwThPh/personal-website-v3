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
        // factory(\App\Social::class, 5)->create();
        // \App\Project::all()->map(function ($p){
        //     $p->socials()->save(factory(\App\Social::class)->create());
        //     $p->socials()->save(factory(\App\Social::class)->create());
        // });

        \App\Social::create(['name' => 'iwanthomphil@gmail.com', 'ref' => 'mailto:iwanthomphil@gmail.com', 'fa' => 'fas fa-inbox']);
        \App\Social::create(['name' => 'Github', 'ref' => 'https://github.com/IwThPh', 'fa' => 'fab fa-github']);
        \App\Social::create(['name' => 'LinkedIn', 'ref' => 'https://www.linkedin.com/in/iwthph/', 'fa' => 'fab fa-linkedin']);
    }
}
