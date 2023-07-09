<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware'=>'admin'],function(){
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        //Роуты для книг
        Route::get('/books',[BookController::class,'index'])->name('book_index');
        Route::get('/book/create',[BookController::class,'create'])->name('book_create');
        Route::post('/book/create',[BookController::class,'store'])->name('book_store');
        Route::get('/book/{book}',[BookController::class,'show'])->name('book_show');
        Route::get('/book/{book}/delete',[BookController::class,'destroy'])->name('book_delete');
        Route::get('/book/{book}/edit',[BookController::class,'edit'])->name('book_edit');
        Route::put('/book/{book}/edit',[BookController::class,'update'])->name('book_update');
        //Роуты для авторов
        Route::get('/authors',[AuthorController::class,'index'])->name('author_index');
        Route::get('/author/create',[AuthorController::class,'create'])->name('author_create');
        Route::post('/author/create',[AuthorController::class,'store'])->name('author_store');
        Route::get('/author/{author}',[AuthorController::class,'show'])->name('author_show');
        Route::get('/author/{author}/edit',[AuthorController::class,'edit'])->name('author_edit');
        Route::put('/author/{author}/update',[AuthorController::class,'update'])->name('author_update');
        Route::get('/author/{author}/delete',[AuthorController::class,'destroy'])->name('author_delete');
        //Роуты для жанров
        Route::get('/genres',[GenreController::class,'index'])->name('genre_index');
        Route::get('/genre/create',[GenreController::class,'create'])->name('genre_create');
        Route::post('/genre/create',[GenreController::class,'store'])->name('genre_store');
        Route::get('/genre/{genre}',[GenreController::class,'show'])->name('genre_show');
        Route::get('/genre/{genre}/edit',[GenreController::class,'edit'])->name('genre_edit');
        Route::put('/genre/{genre}/update',[GenreController::class,'update'])->name('genre_update');
        Route::get('/genre/{genre}/delete',[GenreController::class,'destroy'])->name('genre_delete');
    });
   
});
