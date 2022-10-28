<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PostDataTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_post_data()
    {
        $response = $this->postJson('/api/data', [
            'temperature' => 28,
            'voltage' => 4.3,
            'weight' => 2800,
            'is_driving' => true,
        ]);

        $response->assertStatus(200);
        $this->assertEquals(1, DB::table('frediano_data')->count());
    }
}
