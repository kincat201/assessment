<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infobeasiswa extends Model
{
    protected $table = 'Info_beasiswa';
    protected $primaryKey = 'id';
    protected $fillable = ['no_anggota','judul','keterangan'];
}
