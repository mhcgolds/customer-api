<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\BaseTestCase;

class CustomerTest extends BaseTestCase
{
    use RefreshDatabase;
    
    public function test_list(): void
    {
        $this
            ->setupSanctum()
            ->get('/api/customer/list')
            ->assertOk();
    }

    public function test_store(): void
    {
        $this
            ->setupSanctum()
            ->postJson('/api/customer/store', [
                'name' => 'Test',
                'country' => 'Brasil'
            ])
            ->assertOk()
            ->assertJson([
                'status' => true,
            ]);
    }

    public function test_show(): void
    {
        $this
            ->setupSanctum()
            ->get('/api/customer/show/1')
            ->assertOk()
            ->assertJson([
                'name' => 'Test',
                'country' => 'Brasil'
            ]);
    }

    public function test_update(): void
    {
        $this
            ->setupSanctum()
            ->putJson('/api/customer/update/1', [
                'name' => 'Test',
                'country' => 'Brasil'
            ])
            ->assertOk()
            ->assertJson([
                'status' => true,
            ]);
    }

    public function test_destroy(): void
    {        
        $this
            ->setupSanctum()
            ->delete('/api/customer/destroy/1')
            ->assertOk()
            ->assertJson([
                'status' => true,
            ]);
    }
}
