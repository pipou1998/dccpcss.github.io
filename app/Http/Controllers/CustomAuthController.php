<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;

use DB;
use Auth;

class CustomAuthController extends Controller
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
        if(Auth::user()->role == "ADMIN"){

            $users = User::orderBy('user_id', 'desc')
                ->paginate(20);
            return view('custom-auth.index')->with('users',$users);

        }
        elseif(Auth::user()->role == "INSTRUCTOR"){

            $users = User::where('under',Auth::user()->user_id)
                ->orderBy('user_id', 'desc')
                ->paginate(20);
            return view('custom-auth.index')->with('users',$users);

        }
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }
    }
    
    public function showRegisterForm(){
        if(Auth::user()->role == "ADMIN" || Auth::user()->role == "INSTRUCTOR"){

            $users = User::where('role','INSTRUCTOR')
                ->get();
            return view('custom-auth.register')->with('users',$users);

        }
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }
    }

    public function register(Request $request){

        if(Auth::user()->role == "ADMIN" || Auth::user()->role == "INSTRUCTOR"){

            $this->validation_add($request);

            //saving an account
            $request['password'] = bcrypt($request['password']);
            if(Auth::user()->role == "INSTRUCTOR"){
                $request['under'] = Auth::user()->user_id;
            }
            else{
                $request['under'] = $request['under'];
            }
            $request['status'] = 1;
            $request['avatar'] = "avatar.jpg";
            User::create($request->all());

            return redirect('/registered')->with('success','User has been added.');

        }
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }
    }

    public function activate(Request $request){
        if(Auth::user()->role == "ADMIN" || Auth::user()->role == "INSTRUCTOR"){

            $user = User::find($request->post('activate_user_id'));
            $user->status = 1;
            $user->save();

            return Redirect::back()->with('success','Account has been activated.');

        }
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }
    }

    public function deactivate(Request $request){
        if(Auth::user()->role == "ADMIN" || Auth::user()->role == "INSTRUCTOR"){

            $user = User::find($request->post('deactivate_user_id'));
            $user->status = 0;
            $user->save();

            return Redirect::back()->with('success','Account has been deactivated.');

        }
        else{
            return redirect('dashboard')->with('error','Unauthorized Page!');
        }
    }



    public function search(Request $request){
        //$user = User::find(Auth::user()->user_id);
        
        $search = $request->get('search');
        
        if(Auth::user()->role == "ADMIN"){
            $users = DB::table('users')
            ->where('name', 'LIKE', "%$search%")
            ->orwhere('role', 'LIKE', "%$search%")            
            ->orderBy('user_id', 'desc')
            ->paginate(20);
            $users->appends(['search' => $search]); // work with pagination
            return view('custom-auth.index')->with('users',$users);
        }
        if(Auth::user()->role == "INSTRUCTOR"){ 
            $users = DB::table('users')
            ->where('under',Auth::user()->user_id)
            ->where(function($query)use($search){
                $query
                ->where('name', $search)
                ->orderBy('created_at', 'desc');
            })->paginate(20);
            $users->appends(['search' => $search]); // work with pagination
            return view('custom-auth.index')->with('users',$users);
        }



    }


    
    public function validation_add($request){
        return $this->validate($request, [
            'name' => ['required', 'string', 'max:191'],
            'cp' => ['required', 'string', 'min:11', 'max:13'],
            'address' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:191', 'confirmed'],
            'role' => ['required', 'string', 'max:191'],
            // 'under' => ['required', 'string', 'max:191'],
        ]);
    }
}
