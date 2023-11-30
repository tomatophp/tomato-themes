<?php

namespace TomatoPHP\TomatoThemes;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenuRegister;
use TomatoPHP\TomatoThemes\Console\TomatoSectionGenerator;
use TomatoPHP\TomatoThemes\Console\TomatoThemesGenerate;
use TomatoPHP\TomatoThemes\Facades\TomatoThemes;
use TomatoPHP\TomatoThemes\Menus\ThemesMenu;
use TomatoPHP\TomatoThemes\Services\Theme;
use TomatoPHP\TomatoThemes\Views\BuilderPage;
use TomatoPHP\TomatoThemes\Views\BuilderToolbar;


class TomatoThemesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoThemes\Console\TomatoThemesInstall::class,
            TomatoThemesGenerate::class,
            TomatoSectionGenerator::class
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
           __DIR__.'/../resources/lang' => base_path('lang/vendor/tomato-themes'),
        ], 'tomato-themes-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');


        if(File::exists(base_path('Themes'))){
            $activeTheme = false;
            $themes = File::directories(base_path('Themes'));
            if (count($themes)){
                foreach($themes as $theme){
                    $themeInfo = json_decode(File::get($theme.'/info.json'), false);
                    if($themeInfo->active){
                        $activeTheme = $themeInfo->name;
                        break;
                    }
                }
                if($activeTheme){
                    $themeRoutes = base_path('Themes') .'/'.$activeTheme.'/routes/web.php';
                    $this->loadRoutesFrom($themeRoutes);

                    //Register views
                    $this->loadViewsFrom(base_path('Themes') .'/'.$activeTheme, 'themes');
                }
            }
        }

        app()->bind('tomato-themes', function(){
            return new Theme();
        });

        $this->loadViewComponentsAs('tomato', [
            BuilderToolbar::class
        ]);
    }

    public function boot(): void
    {
       TomatoMenu::register([
           Menu::make()
               ->group(__('Themes'))
               ->label(trans('tomato-themes::messages.title'))
               ->icon("bx bxs-brush")
               ->route("admin.themes.index"),
           Menu::make()
               ->group(__('Themes'))
               ->label(__('Features'))
               ->icon('bx bx-list-check')
               ->route('admin.features.index')
       ]);

       TomatoThemes::loadSections();
    }
}
