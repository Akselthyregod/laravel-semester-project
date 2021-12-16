<?php

namespace App\Http\Controllers;

use App\Models\Live_batch;
use Illuminate\Support\Facades\DB;

class ajaxController extends Controller{

    function getStatus(){

        $live_batch = Live_batch::all();
        $data = $live_batch->pluck('stateID')->last();

        $status = DB::table('states')
            ->select('state')
            ->where('value', '=', $data)
            ->value('value');


        return response()->json([
            'status' => $status
        ]);

    }
}

