<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    protected $table = 'sertifikat'; // Sesuai database Anda

    protected $fillable = [
        'id_user',
        'id_order',
        'id_order_item',
        'nama_pemilik',
        'nomor_surat',
        'full_nomor_surat', // sesuaikan nama kolom di image (full_nomor_surat)
        'tanggal_terbit',
        'soft_delete'
    ];
}
