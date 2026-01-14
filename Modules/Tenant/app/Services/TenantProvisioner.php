<?php

namespace Modules\Tenant\Services;

use Illuminate\Support\Facades\Artisan;
use Modules\Tenant\Models\Tenant;
use Illuminate\Support\Str;

class TenantProvisioner
{
    public function createTenant(string $name, string $domain): Tenant
    {
        $tenant = Tenant::create([
            'uuid' => Str::uuid(),
            'name' => $name,
            'domains' => [$domain],
        ]);

        return $tenant;
    }
}
