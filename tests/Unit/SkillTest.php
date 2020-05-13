<?php

namespace Tests\Unit;

use App\Skill;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SkillTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * Test if a skill can have many associated projects.
     *
     * @return void
     */
    public function skill_belongs_to_many_projects()
    {
        $skill = factory(Skill::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $skill->projects());
    }
}
