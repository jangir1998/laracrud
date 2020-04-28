<?php

namespace gkblabs\subscription\Facades;

use Illuminate\Support\Facades\Facade;

class subscription extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'subscription';
    }
}
