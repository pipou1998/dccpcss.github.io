<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE APP\Disapproved;
use Auth;
use DB;
class DisappoveController extends Controller
{
    //
    public function index(){
        $viewdis = DB::table('disapproveds')
        ->where('under',Auth::user()->user_id)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('disapproved.index')->with('viewdis',$viewdis);
    }
    public function approved(){
        $viewdis = DB::table('add_questions')
        ->where('under',Auth::user()->user_id)
        ->where('status',1)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('disapproved/approved')->with('viewdis',$viewdis);
    }
}
