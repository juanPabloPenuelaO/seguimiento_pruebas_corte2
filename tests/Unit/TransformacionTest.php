<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Libro;

class TransformacionTest extends TestCase
{
    /** @test */
    public function testTransformacionTituloMayuscula()
    {
        $libro = new Libro(['titulo' => 'hola mundo', 'autor' => 'yo']);
        $libro->titulo = strtoupper($libro->titulo);

        $this->assertEquals('HOLA MUNDO', $libro->titulo);
    }
}
