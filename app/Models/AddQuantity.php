<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddQuantity extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_info_id',
        'add_quantity',
        'add_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'add_date' => 'date:m-d-Y',
    ];
    
    //how many relationship does this model have with other models
    public function inventory_info()
    {
        return $this->belongsTo(InventoryInfo::class);
    }
}
