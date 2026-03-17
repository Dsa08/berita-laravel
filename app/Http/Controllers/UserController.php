<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
        public function index() {
        $users = \App\Models\User::all();
        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, $id) {
        $user = \App\Models\User::findOrFail($id);
        $user->update(['role' => $request->role]);
        return back()->with('success', 'Role user berhasil diubah!');
    }
}
