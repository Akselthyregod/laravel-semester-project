<?php

namespace App\Http\Controllers;

use App\Models\Java_test;
use App\Models\Live_batch;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    function index2(){

        $tests = Java_test::all();
        $batch = Live_batch::all();

        return view("index2", ['tests' => $tests, 'batch' => $batch]);
    }
}
