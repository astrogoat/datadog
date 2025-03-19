<?php

namespace Astrogoat\Datadog;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Astrogoat\Datadog\Datadog
 */
class DatadogFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'datadog';
    }
}
