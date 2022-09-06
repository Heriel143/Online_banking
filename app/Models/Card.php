<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_no',
        'account_no',
        'card_type',
        'cvv',
        'expire',
    ];

}
