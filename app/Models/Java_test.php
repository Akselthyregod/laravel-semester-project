<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Java_test extends Model
{
    use HasFactory;

    protected $fillable = [
        'tests',
    ];

    public function getTests(){

        return DB::table('java_tests')->get();
    }
}
