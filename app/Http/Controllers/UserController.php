<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser() {
        $result = User::all();
        return view('livewire.datauser', compact('result'));
    }
}
