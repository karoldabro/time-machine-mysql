<?php

namespace Kdabrow\TimeMachineMysql\Tests;

use Kdabrow\TimeMachineMysql\Providers\TimeMachineMysqlProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            TimeMachineMysqlProvider::class,
        ];
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }
}