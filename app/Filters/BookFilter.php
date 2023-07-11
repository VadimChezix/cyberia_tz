<?php
namespace App\Filters;
class BookFilter extends QueryFilter
{
public function author_id($id = null)
{
    return $this->builder->when($id, function($query) use($id){
        $query->where('author_id',$id);
});
}
public function search_field($search_string = '')
{
return $this->builder->where('name', 'LIKE', '%' .$search_string. '%');
}
};