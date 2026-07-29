<?php

namespace App\Http\Middleware;

use Override;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    #[Override]
    protected $except = [
        //
    ];
}
