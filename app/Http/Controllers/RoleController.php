<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();  // Fetch users with their roles
        $roles = Role::all();  // Get all available roles
        return view('backend.role.index', compact('users', 'roles'));  // Correct path for the index view
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);
    
        $user = User::findOrFail($request->user_id);
        $role = Role::findOrFail($request->role_id);
        $user->assignRole($role);  // Assign role to user
    
        return redirect()->route('role.index')->with('success', 'Role assigned successfully!');
    }
    
    public function updateUserRole(Request $request)
    {
        try {
            $data = $request->all();
            $user = User::findOrFail($data['userId']);
            $role = Role::findOrFail($data['roleId']);
            $user->syncRoles([$role]);  // Sync roles
            Alert::success('Success', "Role assigned successfully.");
            return redirect()->route('role.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        }
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();  // Remove all roles
    
        return redirect()->route('role.index')->with('success', 'Role removed successfully!');
    }
}