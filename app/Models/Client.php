<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'postcode',
        'city',
        'country',
        'website',
        'email',
    ];

    /**
     * Relationship to companies
     */
    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }
}