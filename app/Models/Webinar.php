<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Webinar extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopeSearch($query, $search)
    {
        $query->when($search ?? false, function($query, $search){
            return $query->where('title', 'like', "%$search%");
        });
    }

    public function scopeCategory($query, $category)
    {
        $query->when($category ?? false, function($query, $category){
            $query->where('category_id', $category);
        });
    }
}
