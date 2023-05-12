<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SummaryResult;
use Auth;
use DB;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cableArrg(Request $request){
        if(Auth::user()->status == 1){

            $summaryResult = new SummaryResult;
            $summaryResult->userID          = Auth::user()->user_id;
            $summaryResult->fullName        = Auth::user()->name;
            $summaryResult->correctAnswer   = $request->score;
            $summaryResult->wrongAnswer     = 16;
            $summaryResult->maxedQuestion   = 16;
            $summaryResult->remark          = $request->pf;
            $summaryResult->quiz_passed     = 'cable arrg';
            $summaryResult->under           = Auth::user()->under;
            $summaryResult->save();

            return redirect('dashboard')->with('success','Successful.');
            
        }  
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }      
    }

    public function sysUnit(Request $request){
        if(Auth::user()->status == 1){

            $summaryResult = new SummaryResult;
            $summaryResult->userID          = Auth::user()->user_id;
            $summaryResult->fullName        = Auth::user()->name;
            $summaryResult->correctAnswer   = $request->score;
            $summaryResult->wrongAnswer     = 14;
            $summaryResult->maxedQuestion   = 14;
            $summaryResult->remark          = $request->pf;
            $summaryResult->quiz_passed     = 'sys unit';
            $summaryResult->under           = Auth::user()->under;
            $summaryResult->save();

            return redirect('dashboard')->with('success','Successful.');
            
        }  
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }      
    }

}
