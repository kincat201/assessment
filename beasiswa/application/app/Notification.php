<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'NOTIFICATION';

    protected $primaryKey = 'id';

    protected $fillable = [
        'USER_ID',
        'NO_ANGGOTA',
        'SUBJECT',
        'DESCRIPTION',
        'TYPE',
        'STATUS',
    ];
}
