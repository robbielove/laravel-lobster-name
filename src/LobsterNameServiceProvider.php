<?php

namespace Robbielove\LobsterName;

use Illuminate\Support\ServiceProvider;
use Robbielove\LobsterName\Commands\LobsterNameCommand;

class LobsterNameServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                LobsterNameCommand::class,
            ]);
        }
    }
}
