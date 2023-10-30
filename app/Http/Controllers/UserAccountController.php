<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Personnel;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class UserAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.profile.view',[
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email',
            'phone' => 'max:15'
        ]);

        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone','Nil');

        
            
        $personnel = Personnel::where('user_id', $user->id)->first();

        $personnel->slug = Str::slug($request->input('name'));
        $personnel->designation = $request->input('designation', 'Nil');
        $personnel->job_description = $request->input('job_description','Nil');
        $success = DB::transaction(function() use ($user, $personnel){
                
                $user->save();
                return $personnel->save();
        },3);
        
        
        if($success){
            return back()->with('action-success','Profile Updated Successfully.');
        }
        return back()->with('action-fail','Something went wrong, Try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function uploadPhoto(Request $request, User $user)
    {
        
            $request->validate([
                'photo' => 'bail|required|file|image|max:2024|mimes:jpg,png'
            ]);
            if($request->file('photo')){
                $userId = $user->id;
                $extension = $request->photo->extension();
                $filename = $userId.".".$extension;
                
                $path = $request->photo->storeAs('images',$filename,'public');
                $user->avatar = 'profile_pics/'.$filename;
                $user->save();
                return back()->with('action-success','Profile Picture Updated Successfully');
            }
            return back()->with('action-fail','Something went wrong. Try Again');
    
    }

    public function changePassword(User $user, Request $request)
    {
        
        
            $request->validate([
                'current_password' => 'bail|required',
                'password' => 'required|min:6|confirmed'
            ]);
            
            if(Hash::check($request->input('current_password'),$user->password)){

                $user->password = Hash::make($request->input('password'));
                $user->save();
                return back()->with('action-success', 'Password Change Successful');
            }
            return back()->with('action-fail', 'Something went wrong. Try again later. Maybe you didnt get your current password right or something.');
    }
        
    
        
        
    
}
