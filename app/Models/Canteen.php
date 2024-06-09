<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canteen extends Model
{
    use HasFactory;
    protected $table = 'canteen';
    protected $fillable = ['user_id', 'name', 'slug', 'description', 'image'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
