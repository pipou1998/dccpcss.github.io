<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class CableController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $result = DB::table('summary_results')
            ->where('userID', Auth::user()->user_id)
            ->where('quiz_passed', 'cable arrg')
            ->where('remark', 'Passed')
            ->get();
        if(count($result)){
            return redirect('dashboard')->with('error', 'You can not proceed!');
        }

        if(Auth::user()->status != 1){
            return view('/deactivated-msg'); //for deactivate account
        }

        return view('cable.index');

    }
   
}
