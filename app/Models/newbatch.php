<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newbatch extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_id',
        'amount',
        'speed',
        'batchID'
    ];
}
