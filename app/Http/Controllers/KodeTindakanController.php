<?php

namespace App\Http\Controllers;

use App\Models\KodeTindakan;
use Illuminate\Http\Request;

class KodeTindakanController extends Controller
{
    public function getKodeTindakan() {
        $result = KodeTindakan::with('kategori', 'kategori_klinis')->get();
        return view('admin.kode-tindakan-terapi.datakodetindakan', compact('result'));
    }
}
