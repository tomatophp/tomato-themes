<?php

namespace TomatoPHP\TomatoThemes\Generator\Traits;

use Illuminate\Support\Facades\Artisan;

trait GenerateModule
{
    public function generateModule()
    {
        Artisan::call('module:make ' . $this->themeName);
        sleep(3);
    }
}
