<?php

namespace TomatoPHP\TomatoThemes\Generator\Traits;

use Illuminate\Support\Str;

trait GenerateReadMe
{
    /**
     * @return void
     */
    private function generateReadMe(): void
    {
        //Generate Readme.md file
        $this->generateStubs(
            $this->stubPath . 'readme.stub',
            base_path("Themes") . '/'. $this->themeName . '/README.md',
            [
                "name" => $this->themeName,
                "description" => $this->themeDescription,
            ],
            [
                base_path("Themes"),
                base_path("Themes") . "/". $this->themeName,
            ]
        );
    }
}
