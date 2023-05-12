<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SummaryResult;
use Illuminate\Support\Facades\Auth;
use DB;

class SummaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function summaryResult(Request $request){
        if(Auth::user()->status == 1){
            $summaryResult = new SummaryResult;
            $summaryResult->userID          = Auth::user()->user_id;
            $summaryResult->fullName        = Auth::user()->name;
            $summaryResult->correctAnswer   = $request->totalCorrect;
            $summaryResult->wrongAnswer     = $request->totalWrong;
            $summaryResult->maxedQuestion   = $request->maxedQuestion;
            $summaryResult->remark = $request->remarksResult;
            $summaryResult->quiz_passed   = $request->quizno;
            $summaryResult->under   = $request->under;
            $summaryResult->save();

            return redirect('dashboard');
            
        }  
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }      
    }
}
