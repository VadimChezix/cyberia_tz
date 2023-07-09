<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use App\Models\Author;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if (Author::all()->count()>0)
        {
        return AuthorResource::collection(Author::paginate(5));
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Record not found'
            ],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new AuthorResource(Author::with('books')->findOrFail($id));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
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
        
        if (! Gate::allows('update-author', $author))
         {
            abort(403);
        }
    
        $author->update($request->validated());
        return new AuthorResource($author);
     
        
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
        return response()->json(
            [
                'status'=>201,
                'message'=>'Deleted succesfully'
            ]
            );
    }
}
