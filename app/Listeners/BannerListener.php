<?php

namespace App\Listeners;

use App\Events\BannerEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmer;

class BannerListener
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
    public function handle(BannerEvent $event): void
    {
        Cache::forget("banner");
    }
}
