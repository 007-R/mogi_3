<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Color;

class HelloTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Color::create([
            'name'=>'blue',
        ]);
        $this->assertDatabaseHas('colors',[
            'name'=>'blue',
        ]);
    }
}
