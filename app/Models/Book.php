<?php

namespace App\Models;
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
    // public function model(){
    //     return PublicationEnum::class;
    // }
    // public static function values(){
    //     return[
    //     self::GRAPHIC => 'graphic',
    //     self::PRINTED => 'printed',
    //     self::DIGITAL => 'digital'
    //     ];
    // }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
