<?php

namespace Modules\Tenant\Services;

use Modules\Tenant\Models\Tenant;
use Stancl\Tenancy\Facades\Tenancy;

class TenantResolver
{
    public function resolve(string $domain): ?Tenant
    {
        $tenant = Tenant::whereHas('domains', fn($q) => $q->where('domain', $domain))->first();

        if ($tenant && $tenant->isActive()) {
            Tenancy::initialize($tenant);
            return $tenant;
        }

        return null;
    }
}
