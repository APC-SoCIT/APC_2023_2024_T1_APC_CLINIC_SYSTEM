<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'birth_date',
        'age',
        'sex',
        'civil_status',
        'address',
        'street',
        'city',
        'province',
        'zip',
        'mobile_number',
        'contact_person',
        'contact_person_number',
    ];

    //where this model belong to other model
    public function user(){
        return $this->belongsTo(User::class);
    }
}
