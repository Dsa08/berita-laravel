<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan ini ada
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        // Mengambil semua data user
        $users = User::all(); 
        
        // Pastikan nama view sesuai dengan struktur folder: admin -> users -> index
        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, $id) 
    {
        $user = User::findOrFail($id);
        $user->update(['role' => $request->role]);
        
        return back()->with('success', 'Role user berhasil diubah!');
    }
}