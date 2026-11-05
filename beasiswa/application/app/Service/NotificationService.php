<?php
namespace App\Service;

use App\Pic;
use App\Util\Constant;
use App\Notification;
use Carbon\Carbon;

class NotificationService {
    public static function sendNotification($user = null, $member = null, $subject, $message, $type){
        $notification = new Notification();
        $notification->USER_ID = $user;
        $notification->NO_ANGGOTA = $member;
        $notification->SUBJECT = $subject;
        $notification->DESCRIPTION = $message;
        $notification->TYPES = $type;
        $notification->STATUS = Constant::NOTIFICATION_STATUS_UNREAD;

        return $notification->save();
    }
}
