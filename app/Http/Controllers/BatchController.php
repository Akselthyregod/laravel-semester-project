<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Command;
use App\Models\Ingredients;
use App\Models\Java_test;
use App\Models\Live_batch;
use App\Models\newbatch;
use App\Models\Product;
use App\Models\states;
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

    public function notifyNew(){

        $live_batch = Live_batch::orderBy('created_at', 'desc')->first();

        $data = [   'new' => false,
                    'data' => $live_batch,
                    'id' => $live_batch->id,
                    'updated' => $live_batch->updated_at,
                    'created' => $live_batch->created_at
                ];

        $current_last = session()->get('last_live_batch', $live_batch);
        if($current_last != $live_batch and $data['data'] != null){
            $data['new'] = true;
        }

        session()->put('last_live_batch', $live_batch);

        return $data;
    }

    public function notifyNewState(){

        $data = ['new' => false,
                'state' => "Unknown"
                ];

        $live_batch = Live_batch::all();
        $data_batch = $live_batch->pluck('stateID')->last();

        $status = DB::table('states')
            ->select('state')
            ->where('value', '=', $data_batch)
            ->value('value');

        $current_status = session()->get('status', null);

        if($current_status != $status){
            $data['new'] = true;
            $data['state'] = $status;
            session()->put('status', $status);
        }

        return $data;
    }

    function indexBatch(){
        $cmd = Command::all();
        $ingredient = Ingredients::all();
        $live_batch = Live_batch::all();
        $states = states::all();

        $data = $live_batch->pluck('stateID')->last();

        $status = DB::table('states')
            ->select('state')
            ->where('value', '=', $data)
            ->value('value');


        $batch = DB::table('live_batches')->latest()->take(11)->get();

        return view("indexBatch", ['batch' => $batch, 'cmd' => $cmd, 'ingredient' => $ingredient, 'status' => $status]);
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
            'speed' =>  ['required', 'max: 600'],
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
        session()->flash('message', 'Batch created successfully.');
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
