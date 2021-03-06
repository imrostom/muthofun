<?php

namespace Imrostom\Muthofun\Tests;

use Orchestra\Testbench\TestCase;
use Imrostom\Muthofun\MuthofunServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [MuthofunServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
