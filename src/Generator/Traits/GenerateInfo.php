<?php

namespace TomatoPHP\TomatoThemes\Generator\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait GenerateInfo
{
    /**
     * @return void
     */
    private function generateInfo(): void
    {
        $this->generateStubs(
            $this->stubPath . 'info.stub',
            base_path('Themes') . '/' . $this->themeName . '/info.json',
            [
                "title" => $this->themeTitle,
                "name" => $this->themeName,
                "description" => $this->themeDescription,
                "alias" => Str::of($this->themeName)->lower()->toString(),
            ],
            [
                base_path("Themes"),
                base_path("Themes") . "/". $this->themeName,
            ]
        );
    }
}
