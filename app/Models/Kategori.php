<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    protected $fillable = ['nama_kategori'];

    public function kodeTindakan()
    {
        return $this->hasMany(Kategori::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
    }
}
