<?php

namespace TomatoPHP\TomatoThemes\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use TomatoPHP\TomatoThemes\Services\Abstract\Section;

/**
 * @method static registerSection(Section $section)
 * @method static loadSections()
 * @method Collection getSections()
 * @method Collection find()
 * @method void build()
 */
class TomatoThemes extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'tomato-themes';
    }
}
