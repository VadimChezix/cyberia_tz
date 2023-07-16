<?php

namespace App\Models;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Enums\PublicationEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
       'author_id',
       'publication'
    ];
    
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
}
