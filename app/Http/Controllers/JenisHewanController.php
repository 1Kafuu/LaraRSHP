<?php

namespace App\Http\Controllers;

use App\Models\JenisHewan;
use Illuminate\Http\Request;

class JenisHewanController extends Controller
{
    public function getJenisHewan() {
        $result = JenisHewan::all();
        return view('admin.jenis-hewan.datajenishewan', compact('result'));
    }

    public function createJenisHewan(Request $request) {
        $validated = $request->validate([
            'nama_jenis_hewan' => 'required|string|max:255',
        ]);

        $jenis = JenisHewan::where('nama_jenis_hewan', $validated['nama_jenis_hewan'])->first();

        if ($jenis) {
            return redirect()->back()->withInput()->with('error', 'Jenis hewan sudah digunakan');
        } else {
            $result = JenisHewan::create($validated);
            return redirect()->route('datajenishewan')->with('success', 'Jenis hewan berhasil ditambahkan');
        }
    }

    public function deleteJenisHewan($id) {
        $jenis = JenisHewan::findOrFail($id);
        $jenis->delete();

        return redirect()->route('datajenishewan')->with('success', 'Jenis hewan berhasil dihapus');
    }

    public function getJenisHewanbyId($id) {
        $result = JenisHewan::findOrFail($id);
        return response()->json($result);
    }

    public function updateJenisHewan($id, Request $request) {
        $validated = $request->validate([
            'nama_jenis_hewan' => 'required|string|max:255',
        ]);

        $jenis = JenisHewan::findOrFail($id);
        $jenis->update($validated);

        return redirect()->route('datajenishewan')->with('success', 'Jenis hewan berhasil diupdate');
    }
}
