<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;

class UserController extends Controller
{

    public function index(Request $request)
    {
		$users = User::with('roles')->get();
        if(!$request->ajax()){
			return view('users.index',compact('users'));
	   }
	   return response()->json(['users'=> $users], 200);
    }


    public function create()
    {
		$roles= Role::all()->pluck('name');

		return view('users.create',compact('roles'));
    }


    public function store(UserRequest $request)
    {
		//User::created(['number_id'=>$request->number_id]);Es otra forma
       $user= new User($request->all());
	   $user->save();
	   $user->assignRole($request->role);
	   if(!$request->ajax()){
			return back()->with('success', 'user created');
	   }
	   return response()->json(['status'=> 'user created','user'=>$user], 201);


    }





    public function edit(User $user)
    {
		$roles= Role::all()->pluck('name');
        return view( 'users.edit' , compact('user', 'roles') );
    }


    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
		$user->syncRoles([$request->role]);	
		if(!$request->ajax()){
			return back()->with('success', 'user update');
	   }
	   return response()->json([],204);
    }


    public function destroy(Request $request,User $user	)
    {
		$user->delete();
		if(!$request->ajax()){
			return back()->with('success', 'user deleted');
	   }
	   return response()->json([],204);
    }
}
