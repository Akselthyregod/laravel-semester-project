<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\batch_report;
use App\Models\Command;
use App\Models\Current_state;
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
    /*
        $count = count($live_batch);

        if($count > 10) {
            //
        }
    */
        return $data;
    }



    public function notifyNewInventory(){

        $ingredients= Ingredients::all()->pluck('amount');
        $barley= $ingredients['0'];
        $hops = $ingredients['1'];
        $wheat =$ingredients['2'];
        $malt = $ingredients['3'];
        $yeast= $ingredients['4'];


        $data =[
            'new'=> false
        ];
        $currentIngredients = session()->get('ingredients',null);
        if($currentIngredients != $ingredients){
            $data=[
                'Barley'=>$barley,
                'Hops'=>$hops,
                'Wheat'=>$wheat,
                'Malt'=>$malt,
                'Yeast'=>$yeast,
                'new'=>true
            ];
            session()->put('ingredients',$ingredients);
        }
        return $data;

    }
//$batch = DB::table('live_batches')->latest()->take(11)->get();
    public function notifyNewState(){

        $data = ['new' => false,
                'state' => " "
                ];

        $state = Current_state::all()->pluck('state')->last();


        $status = DB::table('states')
            ->select('state')
            ->where('value', '=', $state)
            ->value('value');

        $current_status = session()->get('status', null);

        if($current_status != $status){
            $data['new'] = true;
            $data['state'] = $status;
            session()->put('status', $status);
        }

        return $data;
    }

    function indexBatch(int $batchID){
        $cmd = Command::all()->where('batchID','=', $batchID);
        $ingredient = Ingredients::all();

        $data = $this->notifyNewState();

        $status = $data['state'];

        $b = DB::table('live_batches')->latest()->take(1)->get();

        $batch = DB::table('live_batches')->latest()->take(11)->get();

        return view("indexBatch", ['batch' => $batch, 'cmd' => $cmd, 'ingredient' => $ingredient, 'status' => $status, 'b' => $b]);
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
            'batchID' =>  ['required', 'unique:newbatches', 'max: 65535']
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
        return redirect()->to('/batch/'.$batch['batchID']);

    }

    function result(){
        $batch = Live_batch::all();

        return view("resultBatch", ['batch' => $batch]);
    }

    function reportBatch(int $batchID){

        $data = DB::table('batch_report')->where('batchID', $batchID)->get();


        return view("resultBatch")->with( ['batchReport' => $data]);
    }

    function command(Command $cmd) {
        $cmd->command = \request()->get('cmd');
        $cmd->batchID = \request()->segment(2);
        $cmd->save();

        $data = $this->notifyNewState();

        return redirect()->to('/batch/'. $cmd->batchID)->with('status', $data['state']);
    }

    function ingredients() {
        $ingredient = Ingredients::all();

        return view("pollingtest", ['ingredient' => $ingredient]);
    }


}
