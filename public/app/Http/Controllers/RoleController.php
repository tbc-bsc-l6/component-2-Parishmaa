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

    public function updateUserRole(Request $request){

        try {
            $data=$request->all();
            $user=User::findOrFail($data['userId']);
            $role=Role::findOrFail($data['roleId']);
            $user->syncRoles([$role]);
            Alert::success('Success', "Role Assigned Successfully.");
            return redirect()->route('role.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());}
        }

    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->role_id = null; // Remove the role
        $user->save();

        return redirect()->route('role.index')->with('success', 'Role removed successfully!');
    }
}