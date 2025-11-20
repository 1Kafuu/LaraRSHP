<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class temuDokter extends Model
{
    protected $table = 'temu_dokter';
    protected $primaryKey = 'idreservasi_dokter';
    protected $fillable = ['no_urut', 'waktu_daftar', 'status', 'idpet', 'idrole_user'];
    public $timestamps = false;

    public function pet() {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    public function role_user() {
        return $this->belongsTo(RoleUser::class, 'idrole_user', 'idrole_user');
    }

    public function rekam() {
        return $this->hasMany(RekamMedis::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }
}
