<?php

namespace TomatoPHP\TomatoThemes\Generator\Traits;

trait GenerateRoutes
{
    /**
     * @return void
     */
    private function generateRoutes(): void
    {
        $this->generateStubs(
            $this->stubPath . "route.stub",
            base_path("Themes") . "/". $this->themeName . "/routes/web.php",
            [
                "namespace" => "\\Themes\\" . $this->themeName . "\\App\\Http\\Controllers\\"
            ],
            [
                base_path("Themes"),
                base_path("Themes") . "/". $this->themeName
            ]
        );
    }
}
