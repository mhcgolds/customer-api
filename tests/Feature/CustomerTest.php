<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    private string $token;

    private function getToken()
    {
        $response = $this->postJson('/api/sanctum/token', [
            'email' => 'admin@example.com',
            'password' => 'password',
            'token_name' => 'test'
        ]);

        $this->token = $response->getContent();
    }

    private function getHeaders(): TestCase
    {
        $this->getToken();
        
        return $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->token
        ]);
    }

    public function test_list(): void
    {
        $this
            ->getHeaders()
            ->get('/api/customer/list')
            ->assertOk();
    }

    public function test_store(): void
    {
        $this
            ->getHeaders()
            ->postJson('/api/customer/store', [
                'email' => 'new@example.com',
                'password' => 'password'
            ])
            ->assertOk()
            ->assertJson([
                'status' => true,
            ]);
    }

    public function test_show(): void
    {
        $this
            ->getHeaders()
            ->get('/api/customer/show/1')
            ->assertOk()
            ->assertJson([
                'id' => 1,
                'name' => 'Customer 1',
                'email' => 'customer1@example.com',
            ]);
    }

    public function test_update(): void
    {
        $this
            ->getHeaders()
            ->putJson('/api/customer/update/1', [
                'name' => 'Customer 1',
                'email' => 'customer1@example.com',
            ])
            ->assertOk()
            ->assertJson([
                'status' => true,
            ]);
    }

    public function test_destroy(): void
    {
        $this
            ->getHeaders()
            ->delete('/api/customer/destroy/1')
            ->assertOk()
            ->assertJson([
                'status' => true,
            ]);
    }
}
