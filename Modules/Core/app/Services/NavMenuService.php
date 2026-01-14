<?php

namespace Modules\Core\Services;

class NavMenuService
{
    public static function set(array $menu): void
    {
        app()->instance('current.menu', $menu);
    }

    public static function get(): ?array
    {
        return app()->bound('current.menu')
            ? app('current.menu')
            : null;
    }
}
