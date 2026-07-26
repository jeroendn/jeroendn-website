<?php

/**
 * Define globally accessible functions inside Helpers.php
 */

/**
 * @return string
 */
function getPageTitle(): string
{
    $title = request()->segment(count(request()->segments()));
    return ($title !== null) ? $title : 'home';
}

/**
 * @return bool
 */
function isAdmin(): bool
{
    $user = auth()->user();
    return $user instanceof \App\User && $user->role?->id === 1;
}
