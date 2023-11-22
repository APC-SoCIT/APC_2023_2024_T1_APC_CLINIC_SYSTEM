<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyEmailInfo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'emergency_email_id',
        'email',
    ];

    
    //where this model belong to other model
    public function emergency_email(){
        return $this->belongsTo(EmergencyEmail::class);
    }
}
