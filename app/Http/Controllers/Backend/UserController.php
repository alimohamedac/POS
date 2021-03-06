<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;




class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');


    }
    
    public function index()
    
    {
        $text = request('q');
        $users = User::whereRoleIs('admin')->where('first_name', 'like', '%'.$text.'%')
            ->orWhere('last_name', 'like', '%'.$text.'%')
            ->latest()->paginate(5);

        return view('backend.modules.users.index',compact('users','text'));
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
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users',
            'image'      => 'image',
            'password'   => 'required|confirmed',
            'permissions'=> 'required|min:1',

        ]);

        $request_data = $request->except(['password','password_confirmaion','permissions','image']);
        $request_data['password'] = bcrypt($request->password);

        if($request->image)
        {
            Image::make($request->image)->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
            })
            ->save(public_path('uploads/user_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }

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
            'email' => ['required','email', Rule::unique('users')->ignore($user->id),],
            'image'      => 'image',
            'permissions'=> 'required|min:1',
    
        ]);

        $request_data = $request->except(['permissions','image']);

        if($request->image)
        {
            if($user->image != 'default.png')   //a4an delete oldImage mn public
            {
                Storage::disk('public_uploads')->delete('/user_images/' . $user->image);  //storagedisk tb3 ->config.fileSystem
            }

            Image::make($request->image)->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
            })
            ->save(public_path('uploads/user_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        $user->update($request_data);

        $user->syncPermissions($request->permissions);

        session()->flash('message', trans('backend/messages.success.updated'));
        return redirect()->route('backend.users.index');

    }

    
    public function destroy(User $user)
    {
        if($user->image != 'default.png')         //34an delete it mn public
        {
            Storage::disk('public_uploads')->delete('/user_images/' . $user->image);  //storagedisk tb3 ->config.fileSystem
        }  

        $user->delete();
        session()->flash('message', trans('backend/messages.success.deleted'));
        return redirect()->route('backend.users.index');

    }
}
