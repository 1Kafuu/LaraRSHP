<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    public function getRekam() {
        $query = DB::table('rekam_medis as r')
            ->select(
                'r.idrekam_medis',
                'r.created_at',
                'r.anamnesa',
                'r.temuan_klinis',
                'r.diagnosa',
                'p.nama as nama_pet',
                'u.nama',
            )
            ->join('pet as p', 'r.idpet', '=', 'p.idpet')
            ->join('role_user as ru', 'ru.idrole_user', '=', 'r.dokter_pemeriksa')
            ->join('user as u', 'u.iduser', '=', 'ru.iduser');

        $result = $query->orderBy('r.created_at', 'desc')->get();

        return view('admin.rekam-medis.datarekammedis', compact('result'));
    }
}
