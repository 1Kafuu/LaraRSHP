<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table = 'pemilik';
    protected $primaryKey = 'idpemilik';
    protected $fillable = ['no_wa', 'alamat'];

    public function user(){
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }
}
