<?php

namespace App\Http\Resources;
use App\Models\Author;
use App\Http\AuthorBooksResources;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {  
       
       
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'books'=>AuthorBooksResource::collection($this->books),
            'books_count'=>$this->books->count()
        ];
    }
}
