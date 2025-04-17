<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request){
        $user = User::create($request->all());
        if($user){
            return redirect('/')->with('status','Success adding user');
        } else {
            return redirect()->back()->with('status', 'Failed adding user');
        }
    }

    public function update(Request $request, User $user){
        $user->update($request->all());
        if($user){
            return redirect('/')->with('status','Success Updating user');
        } else {
            return redirect()->back()->with('status', 'Failed Updating user');
        }
    }

    public function destroy(User $user){
        $user->delete();
        if($user){
            return redirect('/')->with('status','Success Deleting user');
        } else {
            return redirect()->back()->with('status', 'Failed Deleting user');
        }
    }
}
