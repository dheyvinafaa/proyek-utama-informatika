<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['order_number', 'user_id', 'menu_id', 'canteen_id', 'quantity', 'total', 'note', 'type', 'status', 'received_at'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }

    public function canteen()
    {
        return $this->belongsTo(Canteen::class, 'canteen_id', 'id');
    }
}
