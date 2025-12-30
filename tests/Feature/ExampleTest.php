<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeResponseTest extends TestCase
{
    public function test_application_responds(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
                 ->orWhere(fn () => $response->assertStatus(302));
    }
}