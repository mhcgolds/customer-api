<?php

namespace Tests;

use App\Models\User;
use Tests\TestCase;

class BaseTestCase extends TestCase
{
    protected function setupSanctum(): BaseTestCase {
        return $this->actingAs(User::factory()->create());
    }
}