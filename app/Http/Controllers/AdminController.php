<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function manage($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.add-role', compact('user','roles'));
    }

    public function update(Request $request, $id) 
    {
        $roleIds = $request->role_ids;
        $user = User::find($id);
        $user->roles()->sync($roleIds);
        return redirect('/admin');

    }

  
    public function index(){
        $users = User::all();
        return view('dashboard.admin-dashboard',compact('users'));
    }
}
