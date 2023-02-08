<?php


use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'splade'])->prefix('themes')->name('admin.themes.')->group(static function (){
   Route::get('/', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'index'])->name('index');
   Route::post('/active', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'active'])->name('active');
   Route::get('/custom/{theme}', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'custom'])->name('custom');
   Route::post('/custom/{theme}', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'customSave'])->name('custom.save');
   Route::get('/create', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'create'])->name('create');
   Route::post('/', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'store'])->name('store');
   Route::get('/upload', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'upload'])->name('upload');
   Route::post('/upload', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'uploadNew'])->name('upload.new');
   Route::delete('/destroy/{theme}', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'destroy'])->name('destroy');
});
