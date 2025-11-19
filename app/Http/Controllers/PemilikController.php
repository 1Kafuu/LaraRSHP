<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemilik;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function getPemilik()
    {
        $result = Pemilik::with('user')->get();
        return view('admin.pemilik.datapemilik', compact('result'));
    }

    public function createPemilik(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email',
            'password' => 'required|string|min:8',
            'no_wa' => [
                'required',
                'regex:/^(\+62|62|0)8[1-9][0-9]{6,9}$/' // ← PASTIKAN ADA DELIMITER PENUTUP
            ],
            'alamat' => 'required|string|max:255',
        ]);

        // Cek duplikasi
        if (User::where('email', $validated['email'])->exists()) {
            return redirect()->back()->withInput()->with('error', 'Email sudah digunakan');
        }

        if (Pemilik::where('no_wa', $validated['no_wa'])->exists()) {
            return redirect()->back()->withInput()->with('error', 'Nomor WhatsApp sudah digunakan');
        }

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);

            $userId = $user->iduser;

            DB::table('role_user')->insert([
                'iduser' => $userId,
                'idrole' => 5,        // role pemilik
                'status' => 1,        // aktif
            ]);

            Pemilik::create([
                'iduser' => $userId,
                'no_wa' => $validated['no_wa'],
                'alamat' => $validated['alamat'],
            ]);
        });

        return redirect()->route('datapemilik')->with('success', 'Pemilik berhasil ditambahkan');
    }

    public function deletePemilik($id)
    {
        $pemilik = Pemilik::with('user')->findOrFail($id);
        $pemilik->delete();
        $role = RoleUser::where('iduser', $pemilik->user->iduser);
        $role->delete();
        $pemilik->user->delete();

        return redirect()->route('datapemilik')->with('success', 'Pemilik berhasil dihapus');
    }

    public function getPemilikbyId($id)
    {
        $pemilik = Pemilik::with('user')->findOrFail($id);
        return response()->json($pemilik);
    }

    public function updatePemilik($id, Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_wa' => [
                'required',
                'regex:/^(\+62|62|0)8[1-9][0-9]{6,9}$/',
            ],
            'alamat' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($request->iduser);
        $user = $user->update([
            'nama' => $validated['nama'],
        ]);

        $role = Pemilik::findOrFail($id);
        $role->update([
            'no_wa' => $validated['no_wa'],
            'alamat' => $validated['alamat']
        ]);

        return redirect()->route('datapemilik')->with('success', 'Pemilik berhasil diupdate');
    }
}
