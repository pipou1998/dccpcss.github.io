<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;
use Hash;
use Redirect;

class ProfileController extends Controller
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

        $user = User::find(Auth::user()->user_id);

        return view('profile.index')->with('user',$user);

    }

    public function updateProfile(Request $request){

        if(Auth::user()->status != 1){
            return view('/deactivated-msg'); //for deactivate account
        }
        
        $this->validation_edit_profile($request);

        if($request->hasFile('avatar')){
            // $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('avatar')->getClientOriginalExtension();
            // $filenameToStore = $filename.'_'.time().'.'.$extension;
            // $path = $request->file('avatar')->storeAs('public/avatar',$filenameToStore);

            // $destinationPath = public_path('/images');
            $destinationPath = storage_path().'/app/public/avatar';

            $avatar = $request->file('avatar');
            $filenameWithExt = $avatar->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $avatar->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //resize,crop image before uploading
            $resize_image = Image::make($avatar->getRealPath());
            $resize_image->orientate();
            $resize_image->resize(1024, null, function ($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationPath.'/'.$filenameToStore);
        }

        //update user
        $user = User::find(Auth::user()->user_id);
        $user->name = $request->input('name');
        $user->cp = $request->input('cp');
        $user->address = $request->input('address');

        if($request->hasFile('avatar')){
            if($user->avatar != 'avatar.jpg'){
                Storage::delete('public/avatar/'.$user->avatar);
            }
            $user->avatar = $filenameToStore;
        }

        $user->save();

        return redirect('/overview')->with('success','Your information has been updated.');

    }

    public function updatePassword(Request $request){

        if(Auth::user()->status != 1){
            return view('/deactivated-msg'); //for deactivate account
        }
    
        $this->validation_edit_password($request);

        $user = User::find(Auth::user()->user_id);
        if($user){
            if(Hash::check($request->input('current_password'), $user->password)){
                //update password
                $user = User::find(Auth::user()->user_id);
                $user->password = bcrypt($request['password']);
                $user->save();

                return redirect('/overview');
            }
            else{
                return Redirect::back()->with('error', 'Current password doesn\'t match.');
            }
        }

    }

    public function validation_edit_profile($request){
        return $this->validate($request, [
            'avatar' => ['image', 'nullable', 'max:10000'], //riquired|mimes:jpg,png,jpeg|max:10000
            'name' => ['required', 'string', 'max:191'],
            'cp' => ['required', 'string', 'min:11', 'max:13'],
            'address' => ['required', 'string', 'max:191'],
        ]);
    }

    public function validation_edit_password($request){
        return $this->validate($request, [
            'current_password' => ['required', 'string', 'min:8', 'max:191'],
            'password' => ['required', 'string', 'min:8', 'max:191', 'confirmed'],
        ]);
    }
}
