<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walletlog extends Model
{
    use HasFactory;

    protected $table = ('wallet_logs');
    protected $fillable = [
        'code', 'wallet_id', 'user_id', 'amount', 'type'
    ];
}
