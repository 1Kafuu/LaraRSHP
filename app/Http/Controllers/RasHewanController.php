<?php

namespace App\Http\Controllers;

use App\Models\RasHewan;
use App\Models\JenisHewan;
use Illuminate\Http\Request;

class RasHewanController extends Controller
{
    public function getRas()
    {
        $result = RasHewan::with('jenishewan')->get();
        return $result;
    }

    public function groupRas()
    {
        // Ambil semua jenis hewan beserta ras-nya (termasuk yang tidak punya ras)
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

        return view('admin.ras.datarashewan', compact('groupRas'));
    }
}
