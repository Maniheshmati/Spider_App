<?php

namespace Mani\Users;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(base_path('resources/views'), 'App\Repository');
    }
}