<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:manage-users');
    }

    public function index(): View
    {
        $users = User::latest()->paginate(20);
        return view('users.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request['uname'] = Str::lower($request['uname']);

        $this->validate($request, [
            'name' => 'required',
            'uname' => 'required|unique:users,uname',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'position' => 'required',
            'phone_number' => ['required', 'regex:/^62[0-9]{9,12}$/'],
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User created successfully');
    }

    public function show($id): View
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request['uname'] = Str::lower($request['uname']);

        $this->validate($request, [
            'name' => 'required',
            'uname' => 'required|unique:users,uname',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'position' => 'required',
            'phone_number' => ['required', 'regex:/^62[0-9]{9,12}$/'],
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}
