<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ActiveTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_post_stae()
    {
        $response = $this->postJson('/api/active', [
            'is_active' => true,
        ]);
        $response = $this->postJson('/api/active', [
            'is_active' => false,
        ]);
        $response = $this->postJson('/api/active', [
            'is_active' => true,
        ]);

        $this->assertEquals(1, DB::table('is_active')->count());
        $response->assertStatus(200);
    }

    /** @test */
    public function can_get_stae()
    {
        $response = $this->postJson('/api/active', [
            'is_active' => true,
        ]);
        $response = $this->postJson('/api/active', [
            'is_active' => true,
        ]);
        $response = $this->getJson('/api/active');

        $this->assertEquals(1, DB::table('is_active')->count());
        $response->assertStatus(200);
    }
}
