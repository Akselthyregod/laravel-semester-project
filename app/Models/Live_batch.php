<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live_batch extends Model
{
    use HasFactory;

    protected $fillable=[
        'prod_processed_count',
        'prod_defective_count',
        'mach_speed',
        'humidity',
        'temperature',
        'vibration'
    ];


}
