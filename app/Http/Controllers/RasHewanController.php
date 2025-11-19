<?php

namespace App\Http\Controllers;

use App\Models\RasHewan;
use App\Models\JenisHewan;
use Illuminate\Http\Request;

class RasHewanController extends Controller
{
    public function getRas() {
        $rashewan = RasHewan::all();
        return $rashewan;
    }

    public function getRasById($id) {
        $rashewan = RasHewan::findOrFail($id);
        return response()->json($rashewan);
    }

    public function groupRas()
    {
        $rasHewan = $this->getRas();
        
        $jenisHewan = JenisHewan::with('rashewan')->get();

        $groupRas = [];

        foreach ($jenisHewan as $jenis) {
            $groupRas[$jenis->nama_jenis_hewan] = [
                'idjenis_hewan' => $jenis->idjenis_hewan,
                'nama_jenis_hewan' => $jenis->nama_jenis_hewan,
                'ras_hewan' => []
            ];

            if ($jenis->rashewan->count() > 0) {
                foreach ($jenis->rashewan as $ras) {
                    $groupRas[$jenis->nama_jenis_hewan]['ras_hewan'][] = [
                        'idras_hewan' => $ras->idras_hewan,
                        'nama_ras' => $ras->nama_ras
                    ];
                }
            }
        }

        return view('admin.ras.datarashewan', compact('groupRas', 'rasHewan'));
    }

    public function createRas(Request $request) {
        $validated = $request->validate([
            'idjenis_hewan' => 'required',
            'nama_ras' => 'required|string|max:255',
        ]);

        $check = RasHewan::where('nama_ras', $validated['nama_ras'])
            ->exists();

        if ($check) {
            return redirect()->back()->withInput()->with('error', 'Ras Hewan sudah ada');
        }

        $ras = RasHewan::create([
            'idjenis_hewan' => $validated['idjenis_hewan'],
            'nama_ras' => $validated['nama_ras'],
        ]);

        return redirect()->route('datarashewan')->with('success', 'Ras Hewan berhasil ditambahkan');
    }

    public function deleteRas($id) {
        $ras = RasHewan::findOrFail($id);
        $ras->delete();
        return redirect()->route('datarashewan')->with('success', 'Ras Hewan berhasil dihapus');
    }

    public function updateRas($id, Request $request) {
        $validated = $request->validate([
            'nama_ras' => 'required|string|max:255',
        ]);

        $ras = RasHewan::findOrFail($id);
        $ras->update([
            'nama_ras' => $validated['nama_ras'],
        ]);

        return redirect()->route('datarashewan')->with('success', 'Ras Hewan berhasil diupdate');
    }
}
