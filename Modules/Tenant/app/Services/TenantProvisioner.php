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

        // Provision database
        $this->provisionDatabase($tenant);

        return $tenant;
    }

    protected function provisionDatabase(Tenant $tenant): void
    {
        $tenant->run(function () {
            Artisan::call('migrate', ['--force' => true]);
        });
    }
}
