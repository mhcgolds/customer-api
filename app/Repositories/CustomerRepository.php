<?php

namespace App\Repositories;

use App\Repositories\Base\BaseRepository;
use App\Models\Customer;

class CustomerRepository extends BaseRepository
{
    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }
}