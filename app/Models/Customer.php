<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CustomerContacts;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country'
    ];

    public function contacts(): HasMany
    {
        return $this->hasMany(CustomerContacts::class);
    }
}
