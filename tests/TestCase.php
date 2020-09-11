<?php

namespace Tests;

use CrudRestApi\Path;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('migrate', ['--database' => 'testbench'])->run();
        $this->loadMigrationsFrom(Path::migrationsPath());
    }

    protected function getPackageProviders($app)
    {
        return ['CrudRestApi\CrudServiceProvider'];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }
}
