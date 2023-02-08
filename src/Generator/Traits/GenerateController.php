<?php

namespace TomatoPHP\TomatoThemes\Generator\Traits;

use Illuminate\Support\Str;

trait GenerateController
{
    /**
     * @return void
     */
    private function generateController(): void
    {
        $this->generateStubs(
            $this->stubPath . "controller.stub",
                base_path("Themes/".$this->themeName."/App/Http/Controllers/HomeController.php"),
            [
                "name" => $this->themeName
            ],
            [
                base_path("Themes"),
                base_path("Themes") . "/". $this->themeName,
                base_path("Themes") . "/". $this->themeName . "/App",
                base_path("Themes") . "/". $this->themeName . "/App/Http",
                base_path("Themes") . "/". $this->themeName . "/App/Http/Controllers"
            ]
        );
    }
}
