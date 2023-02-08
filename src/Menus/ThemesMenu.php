<?php

namespace TomatoPHP\TomatoThemes\Menus;

use TomatoPHP\TomatoPHP\Services\Menu\Menu;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenu;

class ThemesMenu extends TomatoMenu
{
    /**
     * @var ?string
     * @example ACL
     */
    public ?string $group = "Plan";

    /**
     * @var ?string
     * @example dashboard
     */
    public ?string $menu = "dashboard";

    public function __construct()
    {
        $this->group = trans('tomato-themes::messages.group');
    }

    /**
     * @return array
     */
    public static function handler(): array
    {
        return [
            Menu::make()
                ->label(trans('tomato-themes::messages.title'))
                ->icon("bx bxs-brush")
                ->route("admin.themes.index"),
        ];
    }
}
