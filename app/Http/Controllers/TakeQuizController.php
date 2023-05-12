<?php

namespace App\Http\Controllers;
Use Auth;
use Illuminate\Http\Request;
Use DB;
use App\MaxedError;

class TakeQuizController extends Controller
{
    public function index() {

        if(Auth::user()->status != 1){
            return view('/deactivated-msg'); //for deactivate account
        }

        $buttons = DB::table('view_fq')
            ->where('under', Auth::user()->under)
            ->orderBy('quiz_no', 'asc')
            ->get();
        return view('student-takequiz.index')->with('buttons',$buttons);

    }

    public function takeQuizBoard(Request $request){

        if(Auth::user()->status != 1){
            return view('/deactivated-msg'); //for deactivate account
        }

        $result = DB::table('summary_results')
            ->where('userID', Auth::user()->user_id)
            ->where('quiz_passed', $request->input('quizno'))
            ->where('remark', 'Passed')
            ->get();
        if(count($result)){
            return redirect('dashboard')->with('error', 'You can not proceed!');
        }


        if($request->input('type') == 0){

            $maxedError = MaxedError::all();
            $records = DB::table('add_questions')
                ->where('under', $request->input('under'))
                ->where('quiz_no', $request->input('quizno'))
                ->where('status',1)
                ->where('type',0) // true false
                ->get();
                return view('question/question')
                ->with('records', $records)
                ->with('maxedError',$maxedError)
                ->with('under',$request->input('under'))
                ->with('quizno',$request->input('quizno'));

        }

        if($request->input('type') == 1){

            $maxedError = MaxedError::all();
            $records = DB::table('add_questions')
                ->where('under', $request->input('under'))
                ->where('quiz_no', $request->input('quizno'))
                ->where('status',1)
                ->where('type',1) // multiple choice
                ->get();
                return view('question/question2')
                ->with('records', $records)
                ->with('maxedError',$maxedError)
                ->with('under',$request->input('under'))
                ->with('quizno',$request->input('quizno'));
                
        }

    }

}
