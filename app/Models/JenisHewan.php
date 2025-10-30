<?php

namespace App\Models;

use App\Models\RasHewan;
use Illuminate\Database\Eloquent\Model;

class JenisHewan extends Model
{
    protected $table = 'jenis_hewan';
    protected $primaryKey = 'idjenis_hewan';
    protected $fillable = ['nama_jenis_hewan'];

    public function rashewan() {
        return $this->hasMany(RasHewan::class, 'iduser', 'iduser');
    }
}
