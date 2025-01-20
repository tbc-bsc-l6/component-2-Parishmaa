<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    public function index(){
        $users=User::with('roles')->get();
        $roles=DB::table('roles')->get();
        return view('backend.role.index', compact('users','roles'));
    }

    public function create(){
        $users=User::all();
        $roles=DB::table('roles')->get();
        return view('backend.role.create', compact('users','roles'));
    }

    public function store(Request $request){

    }
}
