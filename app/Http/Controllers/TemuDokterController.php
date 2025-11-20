<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\RoleUser;
use App\Models\temuDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemuDokterController extends Controller
{
    public function getTemu(Request $request)
    {
        $filter = $request->query('filter', 'today'); // default: today saja

        $query = DB::table('temu_dokter as td')
            ->select(
                'td.idreservasi_dokter',
                'td.no_urut',
                'td.waktu_daftar',
                'p.nama as nama_pet',
                'u.nama',
                'td.status',
            )
            ->selectRaw("
            CASE 
                WHEN td.status = 'W' THEN 'Waiting'
                WHEN td.status = 'C' THEN 'Complete'
            END as status
        ")
            ->join('pet as p', 'td.idpet', '=', 'p.idpet')
            ->join('role_user as ru', 'ru.idrole_user', '=', 'td.idrole_user')
            ->join('user as u', 'u.iduser', '=', 'ru.iduser');

        // Filter berdasarkan parameter
        if ($filter === 'today') {
            $query->whereDate('td.waktu_daftar', today());
        }

        $result = $query->orderBy('td.no_urut', 'asc')->get();

        $dokter = $this->getDokter();
        $pet = $this->getPet();

        return view('admin.temu-dokter.datatemu', compact('result', 'dokter', 'pet', 'filter'));
    }

    public function getDokter()
    {
        $dokter = RoleUser::with('user')
            ->whereHas('user', function ($query) {
                $query->where('idrole', 2);
            })
            ->get();
        return $dokter;
    }

    public function getPet()
    {
        $pet = Pet::all();
        return $pet;
    }

    public function createTemu(Request $request)
    {
        $validated = $request->validate([
            'idpet' => 'required',
            'idrole_user' => 'required',
        ]);

        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');

        // Cari no_urut terakhir untuk hari ini
        $lastTemu = temuDokter::whereDate('waktu_daftar', $today)->max('no_urut');

        $no_urut = $lastTemu ? $lastTemu + 1 : 1;

        $result = temuDokter::create([
            'idpet' => $validated['idpet'],
            'idrole_user' => $validated['idrole_user'],
            'no_urut' => $no_urut,
            'waktu_daftar' => now(),
            'status' => 'W',
        ]);

        return redirect()->route('datatemu')->with('success', 'Temu Dokter berhasil ditambahkan');
    }

    public function deleteTemu($id)
    {
        $result = temuDokter::findOrFail($id);
        $result->delete();

        return redirect()->route('datatemu')->with('success', 'Temu Dokter berhasil dihapus');
    }

    public function updateTemu($id)
    {
        $result = temuDokter::findOrFail($id);
        $result->update([
            'status' => 'C',
        ]);
        return redirect()->route('datatemu')->with('success', 'Temu Dokter berhasil diupdate');
    }
}
