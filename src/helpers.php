<?php

use Illuminate\Support\Facades\File;
use TomatoPHP\TomatoThemes\Models\Section;

if(!function_exists('theme_assets')) {
    /**
     * @param string|null $path
     * @return string
     */
    function theme_assets(string $path = null): string
    {
        return asset('themes/' . setting('theme_name') . '/' . $path);
    }
}

if(!function_exists('theme_setting')) {
    /**
     * @param string $key
     * @return mixed
     */
    function theme_setting(string $key): mixed
    {
        if(!File::exists(base_path('Themes'))){
            return false;
        }
        if(!File::exists(base_path('Themes') .'/'.setting('theme_path')) ){
            return false;
        }
        $info = json_decode(File::get(base_path('Themes').'/'.setting('theme_path') . "/info.json"), false);
        if(isset($info->settings->{$key})){
            return $info->settings->{$key}->value;
        }

        $settingClass = new \TomatoPHP\TomatoSettings\Settings\ThemesSettings();

        if(isset($settingClass->{'theme_'.$key})){
            return $settingClass->{'theme_'.$key};
        }

        return false;
    }
}

if(!function_exists('section')){
    function section($key, $byPlace = false){
        $section = Section::query();
        if($byPlace){
            if(is_array($key)){
                return $section->whereIn('place', $key)->get();
            }
            else {
                return $section->where('place', $key)->get();
            }
        }
        else {
            if(is_array($key)){
                return $section->whereIn('place', $key)->get();
            }
            else {
                return $section->where('place', $key)->first();
            }
        }
    }
}

