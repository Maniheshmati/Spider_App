<?php
#App Service Provider

namespace Mani\Posts;

use Illuminate\Support\ServiceProvider;

class PostsServiceProvider extends ServiceProvider{
public function boot()
{
    // Boot
}
public function register(){
            $this->app->bind('Mani\Posts', function ($app) {
            return new HandleCategory();
                        });
    }
}