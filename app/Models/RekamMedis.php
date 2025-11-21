<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    protected $fillable = ['created_at', 'anamnesa', 'temuan_klinis', 'diagnosa', 'idpet', 'dokter_pemeriksa', 'idreservasi_dokter'];
    public $timestamps =false;

    public function temudokter(){
        return $this->belongsTo(temuDokter::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }

    public function pet() {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    public function role_user(){
        return $this->belongsTo(RoleUser::class, 'dokter_pemeriksa', 'idrole_user');
    }

    public function detail_rekam() {
        return $this->hasMany(DetailRekam::class, 'iddetail_rekam_medis', 'iddetail_rekam_medis');
    }
}
