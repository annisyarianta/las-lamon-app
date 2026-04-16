<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class NomorSertifikat extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'nomor_sertifikat';
    protected $guarded = [];
}
