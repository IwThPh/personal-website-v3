<?php

namespace Tests\Unit;

use App\Image;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ImageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * Test if an image can have many projects.
     *
     * @return void
     */
    public function image_has_projects()
    {
        $image = factory(Image::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $image->projects());
    }

    /**
     * @test
     * Test if an image can have many socials.
     *
     * @return void
     */
    public function image_has_socials()
    {
        $image = factory(Image::class)->create();
        $this->assertInstanceOf(BelongsToMany::class, $image->socials());
    }
}
