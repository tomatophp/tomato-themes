<?php


use Illuminate\Support\Facades\Route;



Route::middleware(['web', 'auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/pages/{model}/builder', [\TomatoPHP\TomatoThemes\Http\Controllers\BuilderController::class, 'builder'])->name('pages.builder');
    Route::post('admin/pages/{model}/sections', [\TomatoPHP\TomatoThemes\Http\Controllers\BuilderController::class, 'sections'])->name('pages.sections');
    Route::delete('admin/pages/{model}/sections/remove', [\TomatoPHP\TomatoThemes\Http\Controllers\BuilderController::class, 'remove'])->name('pages.remove');
    Route::get('admin/pages/{model}/meta', [\TomatoPHP\TomatoThemes\Http\Controllers\BuilderController::class, 'meta'])->name('pages.meta');
    Route::post('admin/pages/{model}/meta', [\TomatoPHP\TomatoThemes\Http\Controllers\BuilderController::class, 'metaStore'])->name('pages.meta.store');
    Route::post('admin/pages/{model}/clear', [\TomatoPHP\TomatoThemes\Http\Controllers\BuilderController::class, 'clear'])->name('pages.clear');
});

Route::middleware(['web','auth', 'splade', 'verified'])->prefix('themes')->name('admin.themes.')->group(static function (){
   Route::get('/', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'index'])->name('index');
   Route::get('/page/{model}', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'edit'])->name('page.edit');
   Route::post('/page/{model}', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'update'])->name('page.update');
   Route::post('/active', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'active'])->name('active');
   Route::get('/custom/{theme}', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'custom'])->name('custom');
   Route::post('/custom/{theme}', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'customSave'])->name('custom.save');
   Route::get('/create', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'create'])->name('create');
   Route::post('/', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'store'])->name('store');
   Route::get('/upload', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'upload'])->name('upload');
   Route::post('/upload', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'uploadNew'])->name('upload.new');
   Route::delete('/destroy/{theme}', [\TomatoPHP\TomatoThemes\Http\Controllers\ThemesController::class,'destroy'])->name('destroy');
});

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/features', [TomatoPHP\TomatoThemes\Http\Controllers\FeatureController::class, 'index'])->name('features.index');
    Route::get('admin/features/api', [TomatoPHP\TomatoThemes\Http\Controllers\FeatureController::class, 'api'])->name('features.api');
    Route::get('admin/features/create', [TomatoPHP\TomatoThemes\Http\Controllers\FeatureController::class, 'create'])->name('features.create');
    Route::post('admin/features', [TomatoPHP\TomatoThemes\Http\Controllers\FeatureController::class, 'store'])->name('features.store');
    Route::get('admin/features/{model}', [TomatoPHP\TomatoThemes\Http\Controllers\FeatureController::class, 'show'])->name('features.show');
    Route::get('admin/features/{model}/edit', [TomatoPHP\TomatoThemes\Http\Controllers\FeatureController::class, 'edit'])->name('features.edit');
    Route::post('admin/features/{model}', [TomatoPHP\TomatoThemes\Http\Controllers\FeatureController::class, 'update'])->name('features.update');
    Route::delete('admin/features/{model}', [TomatoPHP\TomatoThemes\Http\Controllers\FeatureController::class, 'destroy'])->name('features.destroy');
});

Route::fallback(function ($slug){
    $page= \TomatoPHP\TomatoCms\Models\Page::where('slug', $slug)->firstOrFail();
    return view('tomato-themes::pages.html', compact('page'));
})->middleware(['web','splade']);
