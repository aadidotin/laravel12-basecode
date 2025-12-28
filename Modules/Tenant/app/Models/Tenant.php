<?php

namespace Modules\Tenant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Tenant\Database\Factories\TenantFactory;

class Tenant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];


    protected $casts = [
        'domains' => 'array',
        'features' => 'array',
    ];

    /**
     * Relationship of Tenant with Domains
     */
    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

    /**
     * Checking if the Tenant is active or not
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    // protected static function newFactory(): TenantFactory
    // {
    //     // return TenantFactory::new();
    // }
}
