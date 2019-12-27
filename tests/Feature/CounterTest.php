<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CounterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCounterTest()
    {
        $response = $this->get('/api/counter');
        $response->assertStatus(200);
    }

    public function testIncrementTest()
    {
        $response = $this->get('/api/counter/increment');
        $response->assertStatus(200);

        $response = $this->get('/api/counter');
        $response->assertExactJson(['state' => 1]);
    }

    public function testDecrementTest()
    {
        $this->makeIncrementation(3);

        $response = $this->get('/api/counter/decrement');
        $response->assertStatus(200);

        $response = $this->get('/api/counter');
        $response->assertExactJson(['state' => 2]);
    }

    private function makeIncrementation(int $amount)
    {
        for ($i = 0; $i < $amount; ++$i) {
            $this->get('/api/counter/increment');
        }
    }
}
