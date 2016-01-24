<?php

namespace App\Harvester;

use Illuminate\Support\Facades\Facade;


class HarvesterFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'harvester';
    }
}
