<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Account extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'account_no',
        'account_type',
        'account_name',
        'currency_type',
        'monthly_earnings',
        'balance',
        'status',
        
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id'); 
    }
}
