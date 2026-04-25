<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PlantOrderDetail extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'plant_order_details';
    protected $guarded = [];
}
