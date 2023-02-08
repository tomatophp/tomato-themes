<?php

namespace Tomatophp\TomatoThemes;

use Illuminate\Support\ServiceProvider;


class TomatoThemesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \Tomatophp\TomatoThemes\Console\TomatoThemesInstall::class,
        ]);
 
        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-themes.php', 'tomato-themes');
 
        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-themes.php' => config_path('tomato-themes.php'),
        ], 'tomato-themes-config');
 
        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
 
        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-themes-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-themes');
 
        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-themes'),
        ], 'tomato-themes-views');
 
        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-themes');
 
        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => app_path('lang/vendor/tomato-themes'),
        ], 'tomato-themes-lang');
 
        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
 
    }

    public function boot(): void
    {
        //you boot methods here
    }
}
