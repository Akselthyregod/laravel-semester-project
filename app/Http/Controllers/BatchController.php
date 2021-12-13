<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Command;
use App\Models\Ingredients;
use App\Models\Java_test;
use App\Models\Live_batch;
use App\Models\newbatch;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    function index(){

        $tests = Java_test::all();
        $batch = Live_batch::all();
        $products = Product::all();
        $newbatch = newbatch::all();


        return view("index", ['tests' => $tests, 'batch' => $batch, 'products' => $products, 'newbatch' => $newbatch]);
    }

    function indexBatch(){
        $batch = Live_batch::all();
        $cmd = Command::all();
        $ingredient = Ingredients::all();

        $test = DB::table('ingredients')
            ->where('id',1)->value('amount');

        return view("indexBatch", ['batch' => $batch, 'cmd' => $cmd, 'ingredient' => $ingredient, 'test'=>$test]);
    }

    function view(){
        $batch = Live_batch::all();
        $products = Product::all();

        return view("createBatch", ['batch' => $batch, 'products' => $products]);
    }



    function create() {

        $batch = request()->validate([
            'product_id' => ['required'],
            'amount'=> ['required', 'max:65535'],
            'speed' =>  ['required', 'max: 600']

        ]);
        /*
        $livebatch = request()->validate([
            'prod_processed_count' => ['required'],
            'prod_defective_count' => ['required'],
            'mach_speed' => ['required', 'max: 600'],
            'humidity' => ['required'],
            'temperature' => ['required'],
            'vibration' => ['required']
        ]);
        */

        newBatch::create($batch);
        //Live_batch::create($livebatch);

        return redirect()->to('/');

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

    function ingredients() {
        $ingredient = Ingredients::all();

        return view("pollingtest", ['ingredient' => $ingredient]);
    }
}
