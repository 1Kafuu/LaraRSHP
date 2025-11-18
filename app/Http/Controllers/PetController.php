<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function getPet() {
        $pemilik = $this->getPemilik();
        $ras = $this->getRasHewan();
        $result = Pet::with('pemilik', 'rashewan')->get();
        return view('admin.pet.datapet', compact('result', 'pemilik', 'ras'));
    }

    public function getPemilik(){
        $result = Pemilik::with('user')->get();
        return $result;
    }

    public function getRasHewan(){
        $result = RasHewan::all();
        return $result;
    }

    public function createPet(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'idpemilik' => 'required',
            'idras_hewan' => 'required',
        ]);

        $check = Pet::where('nama', $validated['nama']);

        if ($check->exists()) {
            return redirect()->back()->withInput()->with('error', 'Nama sudah digunakan');
        }

        $result = Pet::create($validated);
        return redirect()->route('datapet')->with('success', 'Pet berhasil ditambahkan');
    }

    public function deletePet($id) {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('datapet')->with('success', 'Pet berhasil dihapus');
    }

    public function getPetbyId($id) {
        $result = Pet::with('pemilik', 'rashewan')->findOrFail($id);
        return response()->json($result);
    }

    public function updatePet($id, Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'idpemilik' => 'required',
            'idras_hewan' => 'required',
        ]);

        $pet = Pet::findOrFail($id);
        $pet->update($validated);

        return redirect()->route('datapet')->with('success', 'Pet berhasil diupdate');
    }
}
