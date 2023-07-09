<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $authors = Author::all();
        return view('Authors_view.author_index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $users = User::all()->where('role','Author');
        $users = User::all();
        foreach ($users as $user)
        {
            foreach($user->tokens as $token)
            {
                dd($token->token);
            }
           
        }
        
        return view('Authors_view.author_create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {   
        $author = Author::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'user_id'=>$request->user_id
        ]);
        return redirect()->route('author_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    { 
        return view('Authors_view.author_show',compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('Authors_view.author_edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $author->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);
        return redirect()->route('author_show',$author->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        DB::table('books')->where('author_id',$author->id)->delete();
        return redirect()->route('author_index');
    }
}
