<?php

namespace App\Repositories;

use App\Repositories\Base\BaseRepository;
use App\Models\CustomerContacts;

class CustomerContactsRepository extends BaseRepository
{
    public function __construct(CustomerContacts $customerContact)
    {
        $this->model = $customerContact;
    }
}