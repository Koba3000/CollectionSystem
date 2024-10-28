<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Collection;
use App\Observers\CollectionObserver;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Collection::observe(CollectionObserver::class);
    }
}
