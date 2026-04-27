<?php

namespace App\Models;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Receipt extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'receipts';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }
}
