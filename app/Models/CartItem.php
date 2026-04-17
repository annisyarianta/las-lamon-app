<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Katalog;
use App\Models\ProdukTanaman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CartItem extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'cart_item';
    protected $guarded = [];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(ProdukTanaman::class, 'id_produk', 'id');
    }

    public function katalog()
    {
        return $this->belongsTo(Katalog::class, 'id_katalog', 'id');
    }
}
