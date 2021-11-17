<?php

namespace App\Http\Controllers;

use App\Models\Java_test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    function index(){

        $tests = Java_test::all();

        return view("index2", ['tests' => $tests]);
    }
}
