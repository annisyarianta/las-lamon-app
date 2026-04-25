<?php

namespace App\Models;

use App\Models\OrderItem;
use App\Models\PlantData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Location extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guarded = [];
    protected $table = 'locations';

    protected $fillable = [
        'name',
        'location_url'
    ];

    public function plantdatas()
    {
        return $this->hasMany(PlantData::class, 'id_location', 'id');
    }

    public function order_item()
    {
        return $this->hasMany(OrderItem::class, 'id_location', 'id');
    }

}
