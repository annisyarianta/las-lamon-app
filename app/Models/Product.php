<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'products';
    protected $guarded = [];

    public function cart_items()
    {
        return $this->hasMany(Cart::class, 'id_product', 'id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'id_product', 'id');
    }
}
