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

// списол статей
Route::get('/', [\App\Http\Controllers\ArticleController::class, 'index'])
    ->name('article.index');
// просмотр статьи
Route::get('/show/{article}', [\App\Http\Controllers\ArticleController::class, 'show'])
    ->name('article.show');
// редактор статьи
Route::get('/edit/{article}', [\App\Http\Controllers\ArticleController::class, 'edit'])
    ->name('article.edit');
// создать статью
Route::get('/create/', [\App\Http\Controllers\ArticleController::class, 'create'])
    ->name('article.create');
// записать новую статью
Route::post('/save/', [\App\Http\Controllers\ArticleController::class, 'save'])
    ->name('article.save');
// удалить статью
Route::get('/delete/{article}', [\App\Http\Controllers\ArticleController::class, 'destroy'])
    ->name('article.delete');
// записывает и выводит отредактированную статью
Route::post('/update/{article}', [\App\Http\Controllers\ArticleController::class, 'update'])
    ->name('article.update');
