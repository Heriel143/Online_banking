<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalInfo extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'mobile_no',
        'birth_date',
        'nationality',
        'physical_address',
        'postal_address',
        'id_card_type',
        'id_no',
    ];
    
}
