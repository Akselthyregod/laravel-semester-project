<?php

namespace App\Http\Controllers;

use App\Models\Java_test;
use App\Models\Live_batch;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    function index(){
        $batch = Live_batch::all();

        return view("indexBatch", ['batch' => $batch]);
    }

    function create(){
        $batch = Live_batch::all();
        $products = Product::all();

        return view("createBatch", ['batch' => $batch, 'products' => $products]);
    }

    function result(){
        $batch = Live_batch::all();

        return view("resultBatch", ['batch' => $batch]);
    }
}
