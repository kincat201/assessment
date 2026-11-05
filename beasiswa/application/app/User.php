<?php

namespace App;

use App\Util\Constant;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
     
     protected $table = 'MST_ANGGOTA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_anggota', 'name' ,'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function member()
    {
        return $this->hasOne(MasterAnggota::class,'NO_ANGGOTA','NO_ANGGOTA');
    }

    public function notification()
    {
        return $this->hasMany(Notification::class,'NO_ANGGOTA','NO_ANGGOTA');
    }

    public function unreadNotifications()
    {
        return $this->notification()->where('STATUS',Constant::NOTIFICATION_STATUS_UNREAD);
    }
}
