<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Command;
use App\Models\Ingredients;
use App\Models\Java_test;
use App\Models\Live_batch;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    function index(){
        $batch = Live_batch::all();
        $cmd = Command::all();
        $ingredient = Ingredients::all();

        return view("indexBatch", ['batch' => $batch, 'cmd' => $cmd, 'ingredient' => $ingredient]);
    }

    function view(){
        $batch = Live_batch::all();
        $products = Product::all();

        return view("createBatch", ['batch' => $batch, 'products' => $products]);
    }

    function create(Batch $batch){
        $batch->product_id = \request()->get('beers');
        $batch->amount = \request()->get('amount');
        $batch->save();

        return redirect()->to('/batch');
    }

    function result(){
        $batch = Live_batch::all();

        return view("resultBatch", ['batch' => $batch]);
    }

    function command(Command $cmd) {
        $cmd->command = \request()->get('cmd');
        $cmd->save();

        return redirect()->to('/batch');
    }
}
