<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagParrent extends Model
{
    use HasFactory;
    protected $table = ("tagparrents");
    protected $fillable = [
        'tag_id', 'product_id'
    ];
}
