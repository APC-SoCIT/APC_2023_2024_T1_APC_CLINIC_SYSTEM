<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_created',
        'section_handle',
    ];
    
    //how many relationship does this model have with other models
    public function emergency_email_info()
    {
        return $this->hasOne(EmergencyEmailInfo::class);
    }
}
