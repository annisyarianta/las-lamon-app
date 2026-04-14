<?php

namespace App\Models;

use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProdukTanaman extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guarded = [];

    public function cart_items()
    {
        return $this->hasMany(CartItem::class, 'id_produk', 'id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'id_produk', 'id');
    }
}
