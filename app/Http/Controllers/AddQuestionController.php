<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AddQuestion;
use App\MaxedError;
//use App\User;



class AddQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addQuestion(){
        if(Auth::user()->role == "INSTRUCTOR"){
            return view('addQuestion/addQuestion');
        }
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }
    }
    public function addQuestion2(){
        if(Auth::user()->role == "INSTRUCTOR"){
            return view('addQuestion/addQuestion2');
        }
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }
    }
    public function addQuestions2(Request $request){
        if(Auth::user()->role == "INSTRUCTOR"){
            if($request->maxedError){
                $request->validate([
                    'about'  => 'required',
                    'question'  => 'required',
                    'answer'    => 'required',
                    'wrong'     => 'required',
                    'quiz_no'     => 'required',
                    'max_error' => 'required|numeric',
                ]);

                $addMaxError = new MaxedError;
                $addMaxError->maxedError = $request->max_error;
                
                MaxedError::query()->delete();
                $addMaxError->save();
            }
            else{
                $request->validate([
                    'about'  => 'required',
                    'question'  => 'required',
                    'answer'    => 'required',
                    'wrong'     => 'required',
                    'quiz_no'     => 'required',
                ]);    
            }
            $addRecord = new AddQuestion;
            $addRecord->about = $request->about;
            $addRecord->question = $request->question;
            $addRecord->answer = $request->answer;
            $addRecord->wrong = $request->wrong;
            $addRecord->wrong1="awan";
            $addRecord->wrong2="awan";
            $addRecord->status = "0";
            $addRecord->type = "0";
            $addRecord->under = Auth::user()->user_id;
            $addRecord->quiz_no = $request->quiz_no;
            $addRecord->save();
            return redirect()->back()->withInput($addRecord->only('about','quiz_no'))->with('success','Successfully added 1 row!');
        }
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }
    }
    public function addQuestions(Request $request){
        if(Auth::user()->role == "INSTRUCTOR"){
            if($request->maxedError){
                $request->validate([
                    'about'  => 'required',
                    'question'  => 'required',
                    'answer'    => 'required',
                    'wrong'     => 'required',
                    'wrong1'     => 'required',
                    'wrong2'     => 'required',
                    'quiz_no'     => 'required',
                    'max_error' => 'required|numeric',
                ]);

                $addMaxError = new MaxedError;
                $addMaxError->maxedError = $request->max_error;
                
                MaxedError::query()->delete();
                $addMaxError->save();
            }
            else{
                $request->validate([
                    'about'  => 'required',
                    'question'  => 'required',
                    'answer'    => 'required',
                    'wrong'     => 'required',
                    'wrong1'     => 'required',
                    'wrong2'     => 'required',
                    'quiz_no'     => 'required',
                ]);    
            }
            $addRecord = new AddQuestion;
            $addRecord->about = $request->about;
            $addRecord->question = $request->question;
            $addRecord->answer = $request->answer;
            $addRecord->wrong = $request->wrong;
            $addRecord->wrong1=$request->wrong1;
            $addRecord->wrong2=$request->wrong2;
            $addRecord->status = "0";
            $addRecord->type = "1";
            $addRecord->under = Auth::user()->user_id;
            $addRecord->quiz_no = $request->quiz_no;
            $addRecord->save();
            return redirect()->back()->withInput($addRecord->only('about','quiz_no'))->with('success','Successfully added 1 row!');
           // return redirect('addquestion');
            // return view('about',$request->about)->with('success','Successfully added 1 row!');; 
            // return back()->with('success','Successfully added 1 row!');
        }
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }


    }

}
