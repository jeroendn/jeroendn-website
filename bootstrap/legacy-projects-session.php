<?php

declare(strict_types=1);

/*
 * Auto-prepended by Apache for every PHP request under public/project/
 * (see docker/php/Dockerfile). The standalone demo projects read their
 * database credentials from the native PHP session, so seed those values
 * from .env before any of their scripts run.
 */

require __DIR__.'/../vendor/autoload.php';

$env = Dotenv\Dotenv::createImmutable(dirname(__DIR__))->safeLoad();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['DB_HOST_PROJECTS'] = $env['DB_HOST_PROJECTS'] ?? '';
$_SESSION['DB_USERNAME_PROJECTS'] = $env['DB_USERNAME_PROJECTS'] ?? '';
$_SESSION['DB_PASSWORD_PROJECTS'] = $env['DB_PASSWORD_PROJECTS'] ?? '';

// Close the session so the projects' own session_start() calls run cleanly.
session_write_close();
