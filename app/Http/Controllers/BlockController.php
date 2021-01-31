<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlockController extends Controller
{

    public function index()
    {
        $data = DB::table('blocks')->paginate(2);
        return view('block_list', compact('data'));
    }

    public function fetch_data(Request $request)

    {

        if($request->ajax()){
            $data = DB::table('blocks')->paginate(2);
            return view('block', compact('data'))->render();
        }

    }
}
