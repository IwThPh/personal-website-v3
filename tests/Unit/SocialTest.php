<?php

namespace Tests\Unit;

use App\Social;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SocialTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * Test if a social can have a project.
     *
     * @return void
     */
    public function social_belongs_to_project()
    {
        $social = factory(Social::class)->create();
        $this->assertInstanceOf(BelongsTo::class, $social->project());
    }

    /**
     * @test
     * Test if a social can have many images.
     *
     * @return void
     */
    public function social_belongs_to_many_images()
    {
        $social = factory(Social::class)->create();
        $this->assertInstanceOf(MorphToMany::class, $social->image());
    }
}
