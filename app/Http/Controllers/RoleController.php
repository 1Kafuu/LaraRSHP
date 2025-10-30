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
}
