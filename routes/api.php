<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookApiController;
use App\Http\Controllers\AuthorApiController;
use App\Http\Controllers\GenreApiController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    
});
//Роут для получение токена пользователя
Route::post('login',[UserController::class,'index']);
//Роуты для кнги
Route::get('/books',[BookApiController::class,'index'])->name('book_index_api');
Route::get('/book/{book}',[BookApiController::class,'show'])->name('book_show_api');
Route::put('/book/{book}/update',[BookApiController::class,'update'])->name('book_update_api');
//Роуты для авторов
Route::get('/authors',[AuthorApiController::class,'index'])->name('author_index_api');
Route::get('/author/{author}',[AuthorApiController::class,'show'])->name('author_show_api');
Route::put('/author/{author}/update',[AuthorApiController::class,'update'])->name('author_update_api');

Route::get('/genres',[GenreApiController::class,'index'])->name('genre_index_api');

