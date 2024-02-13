<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return response()->json(User::all());
    }

    public function show($id){
        return response()->json(User::find($id));
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->balance = $request->balance;
                
        $user->save();
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->balance = $request->balance;

        $user->save();
    }

    public function destroy($id){
        User::find($id)->delete();
    }
}
