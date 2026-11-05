<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstadmin extends Model
{
    protected $table = 'mstadmin';
    protected $primaryKey = 'id';
    protected $fillable = ['*'];
}
