<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OrderItem extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'order_item';
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(ProdukTanaman::class, 'id_produk', 'id');
    }

    public function katalog()
    {
        return $this->belongsTo(Katalog::class, 'id_katalog', 'id');
    }   

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id');
    }
}
