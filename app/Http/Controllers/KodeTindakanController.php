<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KategoriKlinis;
use App\Models\KodeTindakan;
use Illuminate\Http\Request;

class KodeTindakanController extends Controller
{
    public function getKodeTindakan()
    {
        $result = KodeTindakan::with('kategori', 'kategori_klinis')->get();
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kode-tindakan-terapi.datakodetindakan', compact('result', 'kategori', 'kategoriKlinis'));
    }

    public function deleteKode($id)
    {
        $result = KodeTindakan::findOrFail($id);
        $result->delete();

        return redirect()->back()->with('success', 'Kode tindakan berhasil dihapus');
    }

    public function createKode(Request $request)
    {

        // Validate input first
        $validated = $request->validate([
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required',
            'idkategori_klinis' => 'required',
        ]);

        // Get the latest kode safely
        $last_kode = KodeTindakan::latest('kode')->value('kode');

        // Generate new kode
        if ($last_kode) {
            // Extract numeric part and increment
            preg_match('/(\d+)$/', $last_kode, $matches);
            if (isset($matches[1])) {
                $numeric_part = intval($matches[1]) + 1;
                $prefix = substr($last_kode, 0, -strlen($matches[1]));
                $kode = $prefix . $numeric_part;
            } else {
                // If no numeric suffix, append '1'
                $kode = $last_kode . '1';
            }
        } else {
            // First record - set initial kode
            $kode = 'KT001'; // or whatever your initial format should be
        }

        // Create the record
        KodeTindakan::create([
            'kode' => $kode,
            'deskripsi_tindakan_terapi' => $validated['deskripsi_tindakan_terapi'],
            'idkategori' => $validated['idkategori'],
            'idkategori_klinis' => $validated['idkategori_klinis'],
        ]);

        return redirect()->back()->with('success', 'Kode tindakan berhasil ditambahkan');
    }

    public function getKodeTindakanbyId($id, Request $request) {
        $result = KodeTindakan::findOrFail($id);
        return response()->json($result);
    }

    public function updateKode($id, Request $request) {
        $validated = $request->validate([
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required',
            'idkategori_klinis' => 'required',
        ]);

        $kode = KodeTindakan::findOrFail($id);
        $kode->update([
            'deskripsi_tindakan_terapi' => $validated['deskripsi_tindakan_terapi'],
            'idkategori' => $validated['idkategori'],
            'idkategori_klinis' => $validated['idkategori_klinis'],
        ]);

        return redirect()->route('datakodetindakan')->with('success', 'Kode tindakan berhasil diupdate');
    }
}
