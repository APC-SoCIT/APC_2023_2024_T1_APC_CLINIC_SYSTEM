<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_created',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_created' => 'date:m-d-Y',
    ];

    //how many relationship does this model have with other models
    public function inventory_info()
    {
        return $this->hasOne(InventoryInfo::class);
    }
}
