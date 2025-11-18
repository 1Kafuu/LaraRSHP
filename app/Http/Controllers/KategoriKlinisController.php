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

    public function createKategoriKlinis(Request $request){
        $validated = $request->validate([
            'nama_kategori_klinis' => 'required|string|max:255',
        ]);

        $kategori = KategoriKlinis::where('nama_kategori_klinis', $validated['nama_kategori_klinis'])->first();

        if ($kategori) {
            return redirect()->back()->withInput()->with('error', 'Kategori klinis sudah digunakan');
        } else {
            $result = KategoriKlinis::create($validated);
            return redirect()->route('datakategoriklinis')->with('success', 'Kategori klinis berhasil ditambahkan');
        }
    }

    public function deleteKategoriKlinis($id) {
        $kategori = KategoriKlinis::findOrFail($id);
        $kategori->delete();

        return redirect()->route('datakategoriklinis')->with('success', 'Kategori klinis berhasil dihapus');
    }

    public function getKategoriKlinisbyId($id){
        $result = KategoriKlinis::findOrFail($id);
        return response()->json($result);
    }

    public function updateKategoriKlinis($id, Request $request){
        $validated = $request->validate([
            'nama_kategori_klinis' => 'required|string|max:255',
        ]);

        $kategori = KategoriKlinis::findOrFail($id);
        $kategori->update($validated);

        return redirect()->route('datakategoriklinis')->with('success', 'Kategori klinis berhasil diupdate');
    }
}
