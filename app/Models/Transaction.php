<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'sender_acc_no',
        'receiver_acc_no',
        'receiver_acc_name',
        'amount',
    ];
    

    public function account(){
        return $this->hasOne(Account::class, 'account_no', 'sender_acc_no'); 
    }
    public function rock(){
        return $this->hasOne(Account::class, 'account_no', 'receiver_acc_no'); 
    }

    
}
