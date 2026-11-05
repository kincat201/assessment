<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Databeasiswa extends Model
{
    protected $table = 'TBL_PENCAIRAN_BEASISWA';
    protected $primaryKey = 'id';
    protected $fillable = ['no_anggota','telp', 'no_rekening', 'atas_nama', 'nama_bank', 'npwp'];
}
