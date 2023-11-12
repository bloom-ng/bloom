<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('do-admin-operations');

        return view('dashboard.users.index', 
        [
            'user' => Auth::user(),
            'users' => User::all(),
        ]);
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
        $this->authorize('do-admin-operations');

        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'phone' => 'max:15',
            'designation' => 'required'
        ]);
        
        $success = DB::transaction( function() use($request){
            
                $user = User::create([
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'password' => Hash::make('password'),
                        'phone' => $request->input('phone','Nil')
                    ]);
    
            $role = Role::find($request->input('role'));
            if($role->name =='admin'){
                foreach(Role::all() as $user_role){
                    $user->roles()->attach($user_role->id);
                }
            }else{
                $user->roles()->attach($request->input('role'));
            }
    
            $personnel = new Personnel([
                'slug' => Str::slug($user->name),
                'designation' => $request->input('designation','Nil'),
                'job_description' => $request->input('job_description','Nil')
            ]);
            
             return  $user->personnel()->save($personnel);
            
        },3);

        
        
      
       if($success){
        return back()->with('action-success','New user Successfully Added.'); 
       }
        
       return back()->with('action-fail','Something went wrong, Try again.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('do-admin-operations');
        //return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('do-admin-operations');
        return view('dashboard.users.edit', [
            'user' => Auth::user(),
            'current_user' =>$user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('do-admin-operations');
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email',
            'role' => 'required',
            'phone' => 'max:15'
        ]);

        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone','Nil');

        

        $personnel = Personnel::where('user_id', $user->id)->first();

        $personnel->slug = Str::slug($request->input('name'));
        $personnel->designation = $request->input('designation', 'Nil');
        $personnel->job_description = $request->input('job_description','Nil');
        $success = DB::transaction(function() use ($user, $personnel, $request){
                $role = Role::find($request->input('role'));
                if($role->name =='admin'){
                    foreach(Role::all() as $user_role){
                        $user->roles()->detach($user_role->id);
                    }
                    foreach(Role::all() as $user_role){
                        $user->roles()->attach($user_role->id);
                    }
                }else{
                    foreach(Role::all() as $user_role){
                        $user->roles()->detach($user_role->id);
                    }
                    $user->roles()->attach($request->input('role'));
                }
                
                $user->save();
                return $personnel->save();
        },3);
        
        
        if($success){
            return redirect('/dashboard/users')->with('action-success','User Updated Successfully.');
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
        $this->authorize('do-admin-operations');
        $personnel = Personnel::where('user_id',$user->id)->first();

        $success = DB::transaction(function() use($user, $personnel){
            $personnel->delete();
            return $user->delete();
        },3);
        
        if($success){ return back()->with('action-success','User Deleted Successfully.');}
        return back()->with('action-fail','Something went wrong. Try again.');
    }

    public function resetPassword(User $user)
    {
        $this->authorize('do-admin-operations');
        $user->password = Hash::make('password');
        $success = $user->save(); 
        if($success){ return back()->with('action-success','Password Reset Successful.');}
        return back()->with('action-fail','Something went wrong. Try again.');
    }

     public function toggleFeatured(User $user){
        
        $personnel = Personnel::where('user_id',$user->id)->first();
        $personnel->featured==1?$personnel->featured = 0: $personnel->featured = 1;
        $success = $personnel->save();
        if($success){
            return back()->with('action-success','User Featured Status Changed');
        }
        return back()->with('action-fail','Something went wrong, Try again.');
    }
}
