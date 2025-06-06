<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidacionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testValidacionTituloRequerido()
    {
        $response = $this->postJson('/api/items', ['autor' => 'Autor']);
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['titulo']);
    }
}
