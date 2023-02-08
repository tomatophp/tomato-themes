<?php

namespace TomatoPHP\TomatoThemes\Generator;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use TomatoPHP\ConsoleHelpers\Traits\HandleFiles;
use TomatoPHP\ConsoleHelpers\Traits\HandleStub;
use TomatoPHP\TomatoSettings\Settings\ThemesSettings;
use TomatoPHP\TomatoThemes\Generator\Traits\GenerateController;
use TomatoPHP\TomatoThemes\Generator\Traits\GenerateFolders;
use TomatoPHP\TomatoThemes\Generator\Traits\GenerateInfo;
use TomatoPHP\TomatoThemes\Generator\Traits\GenerateReadMe;
use TomatoPHP\TomatoThemes\Generator\Traits\GenerateRoutes;

class GenerateTheme
{
    use HandleStub;
    use HandleFiles;
    use GenerateFolders;
    use GenerateController;
    use GenerateInfo;
    use GenerateReadMe;
    use GenerateRoutes;

    public function __construct(
        private string $themeName,
        private string|null $themeDescription,
        public string|null $stubPath = null,
        public string|null $themeTitle = null
    )
    {
        $this->themeTitle = $themeName;
        $this->themeName = Str::of($themeName)->camel()->ucfirst()->toString();
        $this->stubPath = __DIR__ . '/../../stubs/';
        $this->publish = __DIR__ . '/../../stubs/';
    }

    /**
     * @return void
     */
    public function generate(): void
    {

        $this->generateFolders();
        $this->generateController();
        $this->generateRoutes();
        $this->generateReadMe();
        $this->generateInfo();
    }
}
