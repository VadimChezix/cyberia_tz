<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use App\Enums\PublicationEnum;
use App\Filters\BookFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BookRequest;
use App\Http\Requests\BookUpdateRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookFilter $request)
    {
        $books = Book::filter($request)->get();
        $genres= Genre::all();
        $authors=Author::all();
        return view('Books_views.book_index',compact('books','authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
      
       
        $genres = Genre::all();
        $authors = Author::all();
      return view('Books_views.book_create',compact('genres'),compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
       
        $book = Book::create([
          'name'=>$request->name,
          'author_id'=>$request->author_id,
          'publication'=>$request->publication
        ]);

        //добавление данных с формы в pivot-таблицу
      if ($request->genres != null)
      {
      foreach ($request->genres as $genre)
      {
        $book->genres()->attach([$genre]);

      };
    }
        return redirect()->route('book_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('Books_views.book_show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
       $authors = Author::all();
       $genres = Genre::all();
     
      
       return view('Books_views.book_edit',compact('book', 'authors', 'genres'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, Book $book)
    {
        $book->update([
          'name'=>$request->name,
          'author_id'=>$request->author_id,
        ]);
        //Удаление старой записи в pivot-таблице и добавленние данных в pivot-таблицу
        if ($request->genres != null)
      {
        foreach ($book->genres as $genre_id)
      {
      $book->genres()->detach([$genre_id->id]);
      }
      foreach ($request->genres as $genre)
     {
      
        $book->genres()->attach([$genre]);
     }
      
    }
        return redirect()->route('book_show',$book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
       
    
        return redirect()->route('book_index');
    }
}
