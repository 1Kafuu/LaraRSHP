<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleUserController extends Controller
{
    public function getRoleUser() {
        $result = RoleUser::with('user', 'role')
        ->orderBy('iduser')
        ->get();
        return $result;
}

    public function groupRolebyUser() {
        $result = $this->getRoleUser();
        $user = [];

        foreach($result as $row) {
            $id = $row->iduser;

            if(!isset($user[$id])) {
                $user[$id] = [
                    'iduser' => $row->iduser,
                    'nama' => $row->user->nama,
                    'roles' => []
                ];
            }

            if($row->idrole && $row->role->nama_role) {
               $user[$id]['roles'][] = [
                    'idrole' => $row->idrole,
                    'nama_role' => $row->role->nama_role,
                    'status' => (bool)$row->status
               ];
            }
        }

        return $user;
    }

    public function viewRoleUser() {
        $result = $this->groupRolebyUser();
        $roles = Role::all();
        return view('admin.dataroleuser', compact('result', 'roles'));
    }

    public function getRoleUserbyId($id) {
        $result = RoleUser::with('user', 'role')->where('iduser', $id)->get();
        return response()->json($result);
    }

    public function updateRoleUser(Request $request, $iduser)
    {

        try {
            // Validasi request
            $request->validate([
                'roles' => 'required|array',
                'roles.*' => 'exists:role,idrole',
                'active_role' => 'required|exists:role,idrole'
            ]);

            // Cari user
            $user = User::find($iduser);
            if (!$user) {
                return redirect()->back()->with('error', 'User tidak ditemukan');
            }

            // Mulai transaction
            DB::beginTransaction();

            // Hapus semua role user yang lama
            RoleUser::where('iduser', $iduser)->delete();

            // Simpan role yang baru
            $roles = $request->input('roles', []);

            $activeRole = $request->input('active_role');

            foreach ($roles as $roleId) {
                $status = ($roleId == $activeRole) ? 1 : 0;
                
                RoleUser::create([
                    'iduser' => $iduser,
                    'idrole' => $roleId,
                    'status' => $status
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Role user berhasil diperbarui');

        } catch (\Exception $e) {
            
            DB::rollBack();

            return redirect()->back()->with('error', 'Gagal memperbarui role user: ' . $e->getMessage());
        }
    }

    public function deleteRoleUser($id) {
        $result = RoleUser::where('iduser', $id);
        $result->delete();

        return redirect()->back()->with('success', 'Role user berhasil dihapus');
    }
}
