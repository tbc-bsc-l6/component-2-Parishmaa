<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get(); // Assuming a 'role' relationship exists
        $roles = Role::all();
        return view('roles.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('role.index')->with('success', 'Role assigned successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('role.index')->with('success', 'Role updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->role_id = null; // Remove the role
        $user->save();

        return redirect()->route('role.index')->with('success', 'Role removed successfully!');
    }
}