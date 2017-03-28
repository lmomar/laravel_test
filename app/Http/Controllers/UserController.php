<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
class UserController extends Controller {

    public function index() {

        $users = User::all();
        return view('users.index',['users' => $users]);
    }
    
    public function create() {
        
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $inputs = $request->all();
        $user = new User();
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->password = bcrypt($inputs['password']);
        $user->role = $inputs['role'];
        $user->save();
        return redirect('users')->with('success','User saved');
    }
    
    public function delete($id) {
        $user = User::find($id);
        if(!empty($user))
        {
            $user->delete();
            return redirect('users')->with('success','User deleted');
        }
    }
    
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.edit',['user' => $user]);
    }
    
    public function update(Request $request,$id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $inputs = $request->all();
        $user = User::findOrFail($id);
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->role = $inputs['role'];
        $user->save();
        return redirect('users')->with('success','User Updated');
    }

}
