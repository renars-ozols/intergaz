<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function deliveryLines()
    {
        return $this->hasMany(DeliveryLine::class);
    }
}
