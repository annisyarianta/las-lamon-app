<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lokasi extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guarded = [];

    public function data_tanaman()
    {
        return $this->hasMany(DataTanaman::class, 'id_lokasi', 'id');
    }
}
