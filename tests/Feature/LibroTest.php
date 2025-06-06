<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Libro;

class LibroTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testInsertarLibro()
    {
        $response = $this->postJson('/api/items', [
            'titulo' => 'Nuevo Libro',
            'autor' => 'Autor X'
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['titulo' => 'Nuevo Libro']);
    }

    /** @test */
    public function testConsultarLibros()
    {
        Libro::factory()->create(['titulo' => 'Libro 1']);
        
        $response = $this->getJson('/api/items');

        $response->assertStatus(200)
                 ->assertJsonFragment(['titulo' => 'Libro 1']);
    }

    /** @test */
    public function testEliminarLibro()
    {
        $libro = Libro::factory()->create();

        $this->deleteJson("/api/items/{$libro->id}")
             ->assertStatus(204);

        $this->getJson("/api/items/{$libro->id}")
             ->assertStatus(404);
    }
}
