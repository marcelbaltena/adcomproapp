<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'postal_code',
        'city',
        'country',
        'vat_number',
        'chamber_of_commerce_number',
        'vat_rate_low',
        'vat_rate_high',
    ];
}
