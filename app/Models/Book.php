<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\BookPublicationEnum;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
       'author_id',
       'publication'
    ];
    protected $casts = [
        'publication'=> BookPublicationEnum::class
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
