<?php

namespace TomatoPHP\TomatoThemes\Generator\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait GenerateFolders
{
    /**
     * @return void
     */
    private function generateFolders(): void
    {
        if(!File::exists(base_path('Themes'))){
            File::makeDirectory(base_path('Themes'));
        }
        if(!File::exists(base_path('Themes'). '/'. $this->themeName)){
            File::makeDirectory(base_path('Themes'). '/'. $this->themeName);
        }
        $this->handelFile('lib', base_path('Themes'). '/'. $this->themeName , 'folder');
    }
}
