<?php

namespace App\Http\Controllers;

use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KategoriKlinisController extends Controller
{
    public function getKategoriKlinis(){
        $result = KategoriKlinis::all();
        return view('admin.kategori-klinis.datakategoriklinis', compact('result'));
    }
}
