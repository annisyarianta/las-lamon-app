<?php

namespace App\Models;

use App\Models\Location;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PlantData extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'plant_datas';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'id_location', 'id');
    }
    
}
