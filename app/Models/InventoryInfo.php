<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'name',
        'type',
        'dosage',
        'quantity',
    ];

    //how many relationship does this model have with other models
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
    
    //how many relationship does this model have with other models
    public function add()
    {
        return $this->hasOne(AddQuantity::class);
    }
    public function reduce()
    {
        return $this->hasOne(ReduceQuantity::class);
    }
    public function daily_info()
    {
        return $this->hasOne(DailyVisitInfo::class);
    }

}
