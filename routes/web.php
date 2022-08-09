<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ThemeController@index')->name('homePage');
Route::post('/', 'ThemeController@setSurvey')->name('setSurvey');

Auth::routes();
Route::get('/register', function () {
    return redirect()->route('home');
});
Route::get('home', function () {
    return redirect()->route('adminHome');
})->name('home');

Route::get('logout', 'Auth\LoginController@logout');

/// indices
Route::prefix('admin')->group(function () {
    Route::get('home', 'HomeController@index')->name('adminHome');
    Route::resource('indices', IndexController::class)->except(['show']);
    Route::resource('shops', ShopController::class)->except(['create']);
    Route::post('shops/update-by-excel', 'ShopController@updateByExcel')->name('shops.updateByExcel');
    Route::get('survey-result', 'SurveyController@surveyResult')->name('surveyResult');
    Route::get('cities', 'ShopController@cities')->name('cities');
});

Route::get('/back/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cache is cleared";
});

