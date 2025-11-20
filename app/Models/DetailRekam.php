<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailRekam extends Model
{
    protected $table = 'detail_rekam_medis';
    protected $primaryKey = 'iddetail_rekam_medis';
    protected $fillable = ['idrekam_medis', 'idkode_tindakan_terapi', 'detail'];
    public $timestamps = false;

    public function kode_tindakan() {
        return $this->belongsTo(KodeTindakan::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
    }

    public function rekam_medis() {
        return $this->belongsTo(RekamMedis::class, 'idrekam_medis', 'idrekam_medis');
    }
}
