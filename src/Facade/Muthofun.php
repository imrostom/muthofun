<?php

namespace Imrostom\Muthofun\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Imrostom\Muthofun\Skeleton\SkeletonClass
 */
class Muthofun extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'muthofun';
    }
}
