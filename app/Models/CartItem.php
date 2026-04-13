<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CartItem extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guarded = [];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart', 'id');
    }
}
