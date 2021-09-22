<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminConteoller;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CategoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::prefix('admin')->middleware('auth','CheckUser')->group(function(){
    Route::get('/',[AdminConteoller::class , 'index'])->name('homepage')->middleware('CheckAdmin');
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
});

// routes/web.php

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

    Route::get('/',[PagesController::class , 'index'])->name('indexPAge');
    Route::get('blog/{slug}',[PagesController::class , 'single'])->name('blog.single');
    Route::get('/contact',[PagesController::class , 'contact'])->name('contact');
    Route::post('/contact',[PagesController::class , 'contactSubmit'])->name('contactSubmit');
    Route::get('/about',[PagesController::class , 'about'])->name('about');

});

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
