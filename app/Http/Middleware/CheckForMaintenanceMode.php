<?php

namespace App\Http\Middleware;

use Override;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    #[Override]
    protected $except = [
        //
    ];
}
