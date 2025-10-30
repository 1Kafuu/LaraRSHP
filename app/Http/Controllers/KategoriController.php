<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function getKategori() {
        $result = Kategori::all();
        return view('admin.kategori.datakategori', compact('result'));
    }
}
