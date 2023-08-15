<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    public function get_token_success(): void
    {
        $response = $this->postJson('/api/sanctum/token', [
            'email' => 'admin@example.com',
            'password' => 'password',
            'token_name' => 'test'
        ]);

        $response->assertOk();
    }

    public function get_token_fail(): void
    {
        $response = $this->postJson('/api/sanctum/token', [
            'email' => 'admin@example.com',
            'password' => 'wrong-password',
            'token_name' => 'test'
        ]);

        $response->assertForbidden();
    }
}
