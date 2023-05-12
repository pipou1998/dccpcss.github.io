<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\AddQuestion;
use App\MaxedError;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dash(){   
        if(Auth::user()->status != 1){
            return view('/deactivated-msg'); //for deactivate account
        }  
        return view('question/questiondashboard');
    }

    public function index(){   
        if(Auth::user()->status != 1){
            return view('/deactivated-msg'); //for deactivate account
        }  
        $records = AddQuestion::where('quiz_no','Q1')
                        ->get();
        $maxedError = MaxedError::all();
        //dd($maxedError);

        return view('question/question')
                    ->with('records', $records)
                    ->with('maxedError',$maxedError);
    }
    public function index2(){   
        if(Auth::user()->status != 1){
            return view('/deactivated-msg'); //for deactivate account
        }       
        $records = AddQuestion::where('quiz_no','Q2')
                        ->get();
        $maxedError = MaxedError::all();
        //dd($maxedError);

        return view('question/question2')
                    ->with('records', $records)
                    ->with('maxedError',$maxedError);
    }
}
