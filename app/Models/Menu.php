<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $fillable = ['name', 'slug', 'description', 'image', 'price', 'category_id', 'canteen_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function canteen()
    {
        return $this->belongsTo(Canteen::class, 'canteen_id', 'id');
    }
}
