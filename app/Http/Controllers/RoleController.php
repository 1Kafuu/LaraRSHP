<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getRole() {
        $result = Role::all();
        return view('admin.datarole', compact('result'));
    }

    public function createRole(Request $request) {
        $validated = $request->validate([
            'nama_role' => 'required|string|max:255',
        ]);
        
        $role = Role::where('nama_role', $validated['nama_role'])->first();

        if ($role) {
            return redirect()->back()->withInput()->with('error', 'Role dengan nama yang sama sudah ada');
        }

        $result = Role::create($validated);

        return redirect()->route('datarole')->with('success', 'Role berhasil ditambahkan');
    }

    public function deleteRole($id) {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('datarole')->with('success', 'Role berhasil dihapus');
    }

    public function getRolebyId($id) {
        $result = Role::findOrFail($id);
        return response()->json($result);
    }

    public function updateRole($id, Request $request) {
        $validated = $request->validate([
            'nama_role' => 'required|string|max:255',
        ]);

        $role = Role::findOrFail($id);
        $role->update($validated);

        return redirect()->route('datarole')->with('success', 'Role berhasil diupdate');
    }
}
