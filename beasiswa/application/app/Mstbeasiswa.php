<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstbeasiswa extends Model
{
    protected $table = 'MASTER_BEASISWA';
    protected $primaryKey = 'id';
    protected $fillable = ['*'];
}
