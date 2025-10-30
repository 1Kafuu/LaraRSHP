<?php

namespace App\Http\Controllers;

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
        return view('admin.dataroleuser', compact('result'));
    }
}
