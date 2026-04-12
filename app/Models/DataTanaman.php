<?php

namespace App\Models;

use App\Models\Lokasi;
use App\Models\ProdukTanaman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DataTanaman extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guarded = [];

    public function produk_tanaman()
    {
        return $this->belongsTo(ProdukTanaman::class, 'id_produk', 'id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id');
    }
    
}
