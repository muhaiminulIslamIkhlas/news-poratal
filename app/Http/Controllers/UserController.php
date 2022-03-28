<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $userList = User::get();
        $currentUser = Auth::user();
        return view('admin.user.index', compact('userList', 'currentUser'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/user/index');
    }

    public function delete($id){
        $currentUser = Auth::user();
        $user = User::where('id', $id)->first();
        if($id != 1 && $currentUser->id == 1){
            $user->delete();
        }
        return redirect('/admin/user/index');
    }
}
