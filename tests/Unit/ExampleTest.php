<?php

namespace Tests\Feature\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
