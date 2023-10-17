<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

//    retrieve deliveries with the same farmer
//$farmer = Farmer::find($farmerId);
//$deliveries = $farmer->deliveries;

// retrieve farmer by delivery
//$delivery = Delivery::find($deliveryId);
//$farmer = $delivery->farmer;

}
