<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

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
                'name' => 'Test',
                'country' => 'Brazil'
            ])
            ->assertOk()
            ->assertJson([
                'status' => true,
            ]);
    }

    public function test_show(): void
    {
        $customer = Customer::factory()->create();

        $this
            ->getHeaders()
            ->get('/api/customer/show/' . $customer->id)
            ->assertOk()
            ->assertJson([
                'name' => 'Test',
                'country' => 'Brazil'
            ]);
    }

    public function test_update(): void
    {
        $customer = Customer::factory()->create();

        $this
            ->getHeaders()
            ->putJson('/api/customer/update/' . $customer->id, [
                'name' => 'Test',
                'country' => 'Brazil'
            ])
            ->assertOk()
            ->assertJson([
                'status' => true,
            ]);
    }

    public function test_destroy(): void
    {
        $customer = Customer::factory()->create();
        
        $this
            ->getHeaders()
            ->delete('/api/customer/destroy/' . $customer->id)
            ->assertOk()
            ->assertJson([
                'status' => true,
            ]);
    }
}
