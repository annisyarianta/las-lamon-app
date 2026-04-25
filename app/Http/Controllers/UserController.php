<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('superadmin.user', compact('users'));
    }

    public function cardSuperadmin()
    {
        $totalUser = User::count();
        $totalAdopter = User::where('role', 'adopter')->count();
        $totalSuperadmin = User::where('role', 'superadmin')->count();
        $totalLsm = User::where('role', 'lsm')->count();

        $users = User::latest()->take(8)->get();

        return view('superadmin.dashboard', compact(
            'totalUser',
            'totalAdopter',
            'totalSuperadmin',
            'totalLsm',
            'users'
        ));
    }

    public function create()
    {
        return view('superadmin.create_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User has been successfully created');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('superadmin.edit_user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'phone' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => $request->phone,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User has been successfully updated');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User has been successfully deleted');
    }
}
