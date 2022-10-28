<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class GetDataTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_data()
    {
        $this->postJson('/api/data', [
            'temperature' => 28,
            'voltage' => 4.3,
            'weight' => 2800,
            'is_driving' => true,
        ]);

        sleep(1.1);
        $this->postJson('/api/data', [
            'temperature' => 28,
            'voltage' => 4.3,
            'weight' => 1337,
            'is_driving' => true,
        ]);

        $response = $this->getJson('/api/data');

        $response->assertStatus(200);
        $this->assertEquals(2, DB::table('frediano_data')->count());
    }
}
