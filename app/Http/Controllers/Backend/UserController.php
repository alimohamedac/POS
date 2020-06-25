<?php

namespace App\Http\Controllers\BAckend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('backend.modules.users.index',compact('users'));
    }

   
    public function create()
    {
        return view('backend.modules.users.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',

        ]);

        $request_data = $request->except(['password','password_confirmaion','permissions']);
        $request_data['password'] = bcrypt($request->password);

        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        session()->flash('message', trans('backend/messages.success.added'));
        return redirect()->route('backend.users.index');
    }

   
    public function edit(User $user)
    {
        return view('backend.modules.users.edit',compact('user')); 
    }

   
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            
        ]);

        $request_data = $request->except(['permissions']);
        $user->update($request_data);

        $user->syncPermissions($request->permissions);

        session()->flash('message', trans('backend/messages.success.updated'));
        return redirect()->route('backend.users.index');

    }

    
    public function destroy(User $user)
    {
        //
    }
}
