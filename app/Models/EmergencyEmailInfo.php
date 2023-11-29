<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyEmailInfo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'emergency_email_id',
        'email',
    ];

    //where this model belong to other model
    public function user(){
        return $this->belongsTo(User::class);
    }
    //where this model belong to other model
    public function emergency_email(){
        return $this->belongsTo(EmergencyEmail::class);
    }
}
