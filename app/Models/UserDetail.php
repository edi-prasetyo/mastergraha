<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = ('user_details');
    protected $fillable = [
        'user_id', 'phone', 'avatar', 'merchant_id', 'merchant_name', 'merchant_address', 'balance', 'bank_name', 'bank_account'
    ];
}
