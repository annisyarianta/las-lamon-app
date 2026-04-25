<?php

namespace App\Models;

use App\Models\Catalogue;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'carts';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class, 'id_catalogue', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
