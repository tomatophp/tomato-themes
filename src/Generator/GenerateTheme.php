<?php

namespace TomatoPHP\TomatoThemes\Generator;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use TomatoPHP\ConsoleHelpers\Traits\HandleFiles;
use TomatoPHP\ConsoleHelpers\Traits\HandleStub;
use TomatoPHP\TomatoSettings\Settings\ThemesSettings;
use TomatoPHP\TomatoThemes\Generator\Traits\GenerateInfo;
use TomatoPHP\TomatoThemes\Generator\Traits\GenerateModule;
use TomatoPHP\TomatoThemes\Generator\Traits\GenerateReadMe;

class GenerateTheme
{
    use HandleStub;
    use HandleFiles;
    use GenerateInfo;
    use GenerateReadMe;
    use GenerateModule;

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
        $this->generateModule();
        $this->generateReadMe();
        $this->generateInfo();
    }
}
