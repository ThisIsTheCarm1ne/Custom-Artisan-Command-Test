<?php

namespace App\Providers;

use App\Console\Commands\CleanUpRecords
use App\Events\PostSaving;
use App\Listeners\SetActiveToFalse;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->commands([
            CleanUpRecords::class,
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadAuthorizationRules();
        Event::listen(
            PostSaving::class,
            SetActiveToFalse::class,
        );
    }

    protected function loadAuthorizationRules(): void
    {
        $json = File::get(config_path('authorization.json'));
        $rules = json_decode($json, true);
        config(['authorization' => $rules]);
    }
}
