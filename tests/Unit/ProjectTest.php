<?php

namespace Tests\Unit;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * Test if a project can have many images.
     *
     * @return void
     */
    public function project_belongs_to_many_images()
    {
        $project = factory(Project::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $project->images());
    }

    /**
     * @test
     * Test if a project can have many socials.
     *
     * @return void
     */
    public function project_has_many_socials()
    {
        $project = factory(Project::class)->create();
        $this->assertInstanceOf(HasMany::class, $project->socials());
    }

    /**
     * @test
     * Test if a project can have many associated skills.
     *
     * @return void
     */
    public function project_belongs_to_many_skills()
    {
        $project = factory(Project::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $project->skills());
    }
}
