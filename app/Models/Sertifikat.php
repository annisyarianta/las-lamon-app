<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sertifikat extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'sertifikat';
    protected $guarded = [];

    public function nama_pemilik()
    {
        return $this->hasMany(CartItem::class, 'id_produk', 'id');
    }

    public function tanggal_terbit()
    {
        return $this->hasMany(CartItem::class, 'id_produk', 'id');
    }
}
