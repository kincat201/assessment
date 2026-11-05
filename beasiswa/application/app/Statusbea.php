<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statusbea extends Model
{
    protected $table = 'statusbea';
    protected $primaryKey = 'id';
    protected $fillable = ['judul','status','created_at','updated_at','keterangan','mulai','akhir'];
}
