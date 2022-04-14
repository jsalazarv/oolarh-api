<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'state',
        'municipality',
        'suburb',
        'street',
        'outdoor_number',
        'interior_number',
        'postal_code'
    ];

    public function addressable()
    {
        return $this->morphTo();
    }
}
