<?php

namespace Kdabrow\TimeMachineMysql\Providers;

use Illuminate\Support\ServiceProvider;
use Kdabrow\TimeMachine\Contracts\DatabaseTableInterface;
use Kdabrow\TimeMachineMysql\Database\MysqlTable;

class TimeMachineMysqlProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/time-machine-mysql.php', 'time-machine-mysql');

        $this->app->bind(DatabaseTableInterface::class, MysqlTable::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/time-machine-mysql.php' => config_path('time-machine-mysql.php'),
        ], 'time-machine-mysql.config');
    }
}