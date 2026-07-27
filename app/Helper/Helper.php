<?php

use App\User;

/**
 * Define globally accessible functions inside Helpers.php
 */

/**
 * @return string
 */
function getPageTitle(): string
{
    $title = request()->segment(count(request()->segments()));
    return $title ?? 'home';
}

/**
 * @return bool
 */
function isAdmin(): bool
{
    $user = auth()->user();
    return $user instanceof User && $user->role?->id === 1;
}
