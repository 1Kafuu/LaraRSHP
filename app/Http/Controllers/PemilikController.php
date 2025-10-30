<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function getPemilik() {
        $result = Pemilik::with('user')->get();
        return view('admin.pemilik.datapemilik', compact('result'));
    }
}
