<?php

namespace Modules\Tenant\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

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
