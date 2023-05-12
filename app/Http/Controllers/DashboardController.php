<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\SummaryResult;
use Illuminate\Support\Facades\Auth as FacadesAuth;
Use DB;
use App\User;
use App\AddQuestion;
use Redirect;
use App\Disapproved;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if(Auth::user()->status != 1){
            return view('/deactivated-msg'); //for deactivate account
        }
        
        $stdshow = DB::table('summary_results')
            ->where('under',Auth::user()->user_id)
            ->orderBy('updated_at', 'desc')
            ->take(10)->get();


        $stdlogs = DB::table('summary_results')
            ->where('userID',Auth::user()->user_id)
            ->orderBy('updated_at', 'desc')
            ->take(10)->get();

        $ins = User::where('role', 'INSTRUCTOR')
            ->orderBy('name', 'ASC')
           ->get();

        // get passed
        $passed = DB::table('summary_results')
            ->where('userID',Auth::user()->user_id)
            ->where('remark', 'Passed')
            ->get();

        // get failed
        $failed = DB::table('summary_results')
            ->where('userID',Auth::user()->user_id)
            ->where('remark', 'Failed')
            ->get();

        return view('dashboard')
            ->with('stdshow',$stdshow)
            ->with('stdlogs',$stdlogs)
            ->with('ins', $ins)
            ->with('passed',$passed)
            ->with('failed',$failed);
 
    }

    public function viewQuestions($id){
       
        $vqs = DB::table('add_questions')
            ->where('under', $id)
            ->where('status', 0)
            ->get();

        return view('view-questions.index')->with('vqs',$vqs);

    }

    public function approved(Request $request){
       
        $u = AddQuestion::find($request->post('approved_id'));
        $u->status = 1;
        $u->save();

        return Redirect::back()->with('success','Question has been approved.');

       
    }

    public function disapproved(Request $request){
       
        $s = new Disapproved;
        $s->quizno = $request->disapproved_q_no;
        $s->question = $request->disapproved_question;
        $s->about = $request->disapproved_about;
        $s->comment = $request->comment;
        $s->under = $request->disapproved_under;
        $s->save();

        $d=AddQuestion::find($request->disapproved_id);
        $d->delete();

        return Redirect::back()->with('success','Question has been disapproved.');

    }

}
