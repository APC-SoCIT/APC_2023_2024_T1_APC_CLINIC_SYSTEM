<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_created',
        'section_handle',
    ];
    
    //where this model belong to other model
    public function user(){
        return $this->belongsTo(User::class);
    }
    //how many relationship does this model have with other models
    public function emergency_email_info()
    {
        return $this->hasOne(EmergencyEmailInfo::class);
    }
}
