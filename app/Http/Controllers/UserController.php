<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser()
    {
        $result = User::all();
        return view('admin.datauser', compact('result'));
    }

    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:2',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::where('email', $validated['email'])->orWhere('nama', $validated['nama'])->first();

        if ($user) {
            return redirect()->back()->withInput()->with('error', 'User dengan email atau nama yang sama sudah ada');
        }

        $result = User::create($validated);
        return redirect()->route('datauser')->with('success', 'User berhasil ditambahkan');
    }

    public function getUserbyId($id)
    {
        $data = User::findOrFail($id);
        return response()->json($data); // Return JSON untuk AJAX
    }

    public function updateUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update([
                'nama' => $request->nama,
            ]);

            return redirect()->route('datauser')->with('success', 'User berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->route('datauser')->with('error', 'Gagal mengupdate user');
        }
    }

    public function deleteUser($id) {
    $user = User::findOrFail($id);
    $user->delete();
    
    return redirect()->route('datauser')->with('success', 'User berhasil dihapus');
}
}
