<?php

namespace App\Http\Controllers;

use App\Models\Java_test;
use App\Models\Live_batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    function index(){

        $tests = Java_test::all();
        $batch = Live_batch::all();

        return view("index", ['tests' => $tests, 'batch' => $batch]);
    }
}
