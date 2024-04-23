<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;

class UserController extends Controller
{

    public function index(Request $request)
    {
		$users = User::get();
        if(!$request->ajax()){
			return view();
	   }
	   return response()->json(['users'=> $users], 200);
    }


    public function create()
    {
        //view
    }


    public function store(UserRequest $request)
    {
		//User::created(['number_id'=>$request->number_id]);Es otra forma
       $user= new User($request->all());
	   $user->save();
	   if(!$request->ajax()){
			return back()->with('success', 'user created');
	   }
	   return response()->json(['status'=> 'user created','user'=>$user], 201);


    }


    public function show(Request $request, User $user)
    {
		if(!$request->ajax()){
			return view();
	   }
	   return response()->json(['status'=>$user], 200);

    }


    public function edit($id)
    {
        //
    }


    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
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
