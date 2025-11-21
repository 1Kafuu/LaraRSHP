<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\temuDokter;
use App\Models\DetailRekam;
use App\Models\KodeTindakan;
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

        $temu = DB::table('temu_dokter as td')
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
            ->join('user as u', 'u.iduser', '=', 'ru.iduser')
            ->whereDate('td.waktu_daftar', today())
            ->orderBy('td.no_urut', 'asc')
            ->get();

        $tindakan = KodeTindakan::all();

        return view('admin.rekam-medis.datarekammedis', compact('result', 'temu', 'tindakan'));
    }

    public function getRekamById($id) {
        $query = DB::table('rekam_medis as r')
            ->select(
                'r.idrekam_medis',
                'r.created_at',
                'r.anamnesa',
                'r.temuan_klinis',
                'r.diagnosa',
                'p.nama as nama_pet',
                'u.nama',
                'dr.detail',
                'k.idkode_tindakan_terapi',
                'k.deskripsi_tindakan_terapi',
                'ka.nama_kategori',
                'kk.nama_kategori_klinis',
            )
            ->join('pet as p', 'r.idpet', '=', 'p.idpet')
            ->join('role_user as ru', 'ru.idrole_user', '=', 'r.dokter_pemeriksa')
            ->join('user as u', 'u.iduser', '=', 'ru.iduser')
            ->join('detail_rekam_medis as dr', 'dr.idrekam_medis', '=', 'r.idrekam_medis')
            ->join('kode_tindakan_terapi as k', 'k.idkode_tindakan_terapi', '=', 'dr.idkode_tindakan_terapi')
            ->join('kategori as ka', 'ka.idkategori', '=', 'k.idkategori')
            ->join('kategori_klinis as kk', 'kk.idkategori_klinis', '=', 'k.idkategori_klinis');

        $result = $query->where('r.idrekam_medis', $id)->get();
        return response()->json($result);
    }

    public function deleteRekam($id) {
        $detail = DB::table('detail_rekam_medis')->where('idrekam_medis', $id)->delete();
        $result = RekamMedis::with('detail_rekam')->findOrFail($id);
        $result->delete();
        return redirect()->route('datarekam')->with('success', 'Rekam Medis berhasil dihapus');
    }

    public function getTemuById($id) {
        $temu = temuDokter::findOrFail($id);
        return response()->json($temu);   
    }

    public function createRekam(Request $request){

        $validated = $request->validate([
            'anamnesa' => 'required|string|max:255',
            'temuan_klinis' => 'required|string|max:255',
            'diagnosa' => 'required|string|max:255',
            'idpet' => 'required',
            'idrole_user' => 'required',
            'idreservasi_dokter' => 'required',
            'detail' => 'required|string|max:500',
            'idkode_tindakan_terapi' => 'required',
        ]);

        $rekam = RekamMedis::create([
            'created_at' => now(),
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
            'diagnosa' => $request->diagnosa,
            'idpet' => $request->idpet,
            'dokter_pemeriksa' => $request->idrole_user,
            'idreservasi_dokter' => $request->idreservasi_dokter,
        ]);

        $detail = DetailRekam::create([
            'idrekam_medis' => $rekam->idrekam_medis,
            'detail' => $request->detail,
            'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
        ]);

        $temu = temuDokter::where('idreservasi_dokter', $request->idreservasi_dokter)->first();
        $temu->status = 'C';
        $temu->save();

        return redirect()->route('datarekam')->with('success', 'Rekam Medis berhasil ditambahkan');
    }

    public function updateRekam(Request $request, $id) {
        $validated = $request->validate([
            'anamnesa' => 'required|string|max:255',
            'temuan_klinis' => 'required|string|max:255',
            'diagnosa' => 'required|string|max:255',
            'detail' => 'required|string|max:500',
            'idkode_tindakan_terapi' => 'required',
        ]);

        $rekam = RekamMedis::findOrFail($id);
        $rekam->update([
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
            'diagnosa' => $request->diagnosa,
        ]);

        $detail = DetailRekam::where('idrekam_medis', $id)->first();
        $detail->update([
            'detail' => $request->detail,
            'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
        ]);

        return redirect()->route('datarekam')->with('success', 'Rekam Medis berhasil diubah');
    }
}
