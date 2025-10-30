<?php

namespace App\Http\Controllers;

use App\Models\RasHewan;
use Illuminate\Http\Request;

class RasHewanController extends Controller
{
    public function getRas() {
        $result = RasHewan::with('jenishewan')->get();
        return $result;
    }

    public function groupRas() {
        $result = $this->getRas();
        $groupRas = [];

        foreach ($result as $ras) {
            $nama_jenis = $ras->jenishewan->nama_jenis_hewan;

            if (!isset($groupRas[$nama_jenis])) {
                $groupRas[$nama_jenis] = [
                    'idjenis_hewan' => $ras->jenishewan->idjenis_hewan,
                    'nama_jenis_hewan' => $ras->jenishewan->nama_jenis_hewan,
                    'ras_hewan' => []
                ];
            }

            $groupRas[$nama_jenis]['ras_hewan'][] = [
                'idras_hewan' => $ras['idras_hewan'],
                'nama_ras' => $ras['nama_ras']
            ];
        }

        return view('admin.ras.datarashewan', compact('groupRas'));
    }
}
