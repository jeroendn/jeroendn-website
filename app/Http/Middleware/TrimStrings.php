<?php

namespace App\Http\Middleware;

use Override;
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    #[Override]
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
