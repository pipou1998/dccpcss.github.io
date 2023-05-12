<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TutorialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if(Auth::user()->status != 1){
            return view('/deactivated-msg'); //for deactivate account
        }

        return view('tutorial.index');

    }
}
