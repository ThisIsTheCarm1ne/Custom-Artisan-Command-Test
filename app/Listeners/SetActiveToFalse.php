<?php

namespace App\Listeners;

use App\Events\PostSaving;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetActiveToFalse
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostSaving $event): void
    {
        if ($event->post->active) {
            echo "SetActiveToFalse handle \n";
            $event->post->active = 0;
            $event->post->save();
        }
    }
}
