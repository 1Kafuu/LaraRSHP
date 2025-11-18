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

    public function createKategori(Request $request) {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::where('nama_kategori', $request->nama_kategori)->first();

        if ($kategori) {
            return redirect()->back()->withInput()->with('error', 'Kategori sudah digunakan');
        } else {
            $result = Kategori::create($validated);
            return redirect()->route('datakategori')->with('success', 'Kategori berhasil ditambahkan');
        }
    }

    public function deleteKategori($id) {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('datakategori')->with('success', 'Kategori berhasil dihapus');
    }

    public function getKategoribyId($id) {
        $result = Kategori::findOrFail($id);
        return response()->json($result);
    }
    public function updateKategori($id, Request $request) {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($validated);

        return redirect()->route('datakategori')->with('success', 'Kategori berhasil diupdate');
    }
}
