<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Str;

class UtilidadesTest extends TestCase
{
    /** @test */
    public function testGenerarUUID()
    {
        $uuid = (string) Str::uuid();
        $this->assertMatchesRegularExpression('/^[0-9a-f\-]{36}$/', $uuid);
    }
}
