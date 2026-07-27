<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // Tests must not depend on a fresh `npm run build` (CI has none), so
        // the @vite directive is stubbed instead of reading the build manifest.
        $this->withoutVite();
    }
}
