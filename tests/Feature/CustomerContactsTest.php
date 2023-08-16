<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\BaseTestCase;

class CustomerContactsTest extends BaseTestCase
{
    use RefreshDatabase;
    
    public function test_list(): void
    {
        $this
            ->setupSanctum()
            ->get('/api/customer-contacts/list/1')
            ->assertOk();
    }

    public function test_store(): void
    {
        $this
            ->setupSanctum()
            ->postJson('/api/customer-contacts/store', [
                'customer_id' => 1,
                'name' => 'Test Contact',
                'email' => 'contact@example.com',
                'dob' => '1988-10-27'
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
            ->get('/api/customer-contacts/show/1')
            ->assertOk()
            ->assertJson([
                'customer_id' => 1,
                'name' => 'Test Contact',
                'email' => 'contact@example.com',
                'dob' => '1988-10-27'
            ]);
    }

    public function test_update(): void
    {
        $this
            ->setupSanctum()
            ->putJson('/api/customer-contacts/update/1', [
                'customer_id' => 1,
                'name' => 'Test Contact',
                'email' => 'contact@example.com',
                'dob' => '1988-10-27'
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
            ->delete('/api/customer-contacts/destroy/1')
            ->assertOk()
            ->assertJson([
                'status' => true,
            ]);
    }
}
