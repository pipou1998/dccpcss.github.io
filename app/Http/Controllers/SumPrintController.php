<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
// use Carbon\Carbon;
use Auth;
use App\User;
use App\SummaryResult;

class SumPrintController extends Controller
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
        $search = "all"; //not used
        $srs = DB::table('summary_results')
        ->where('under',Auth::user()->user_id)
        ->orderBy('created_at', 'desc')
        ->paginate(20);
        return view('sum-print.index')->with('srs',$srs)->with('search',$search);
    }

    public function printSum($search){
        if($search == "all"){
                $srs = DB::table('summary_results')
                ->where('under',Auth::user()->user_id)
                ->orderBy('created_at', 'desc')
                ->get();
                return view('sum-print.print')->with('srs',$srs);
         }
         else {
                $srs = DB::table('summary_results')
                ->where('under',Auth::user()->user_id)
                ->where(function($query)use($search){
                    $query
                    ->where('remark', $search)
                    ->orwhere('quiz_passed', $search)
                    ->orderBy('created_at', 'desc');
                })->paginate(20);
                return view('sum-print.print')->with('srs',$srs);
        }
    }
    
    public function searchSum(Request $request){

        // if (!empty($request)) {
        //     $products = Product::whereHas('categories', function ($query) use ($request) {
        //         $query->where('slug', $request->category);
        //     })->paginate(9);
    
        //     $categories = Category::all();
        //     $categoryName =  optional($categories->where('slug', request()->category)->first())->name;
    
        //     return view('products.index')

        $search = $request->get('search');
        $srs = DB::table('summary_results')
        ->where('under',Auth::user()->user_id)
        ->where(function($query)use($search){
            $query
            ->where('remark', $search)
            ->orwhere('quiz_passed', $search)
            ->orderBy('created_at', 'desc');
        })->paginate(20);

        return view('sum-print.index')->with('srs',$srs)->with('search',$search);
    }

}
