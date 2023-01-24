<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryLine extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
}
