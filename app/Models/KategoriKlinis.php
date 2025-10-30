<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKlinis extends Model
{
    protected $table = 'kategori_klinis';
    protected $primaryKey = 'idkategori_klinis';
    protected $fillable = ['nama_kategori_klinis'];

    public function kodeTindakan() {
        return $this->hasMany(KodeTindakan::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
    }
}
