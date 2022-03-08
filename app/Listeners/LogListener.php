<?php

namespace App\Listeners;

use App\Events\LogEvent;
use App\Log;

class LogListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * handle
     *
     * @param LogEvent event
     *
     * @return void
     */
    public function handle(LogEvent $event)
    {
        Log::create($event->data);
    }
}
