<?php

namespace App\Util;

class Constant {

    const NOTIFICATION_STATUS_READ = 'READ';
    const NOTIFICATION_STATUS_UNREAD = 'UNREAD';

    const NOTIFICATION_STATUS = [
        self::NOTIFICATION_STATUS_READ => 'Terbaca',
        self::NOTIFICATION_STATUS_UNREAD => 'Belum Dibaca',
    ];

    const NOTIFICATION_TYPE_APPLICATION = 'APPLICATION';
    const NOTIFICATION_TYPE_RESULT = 'RESULT';
    const NOTIFICATION_TYPE_OTHER = 'OTHER';

    const NOTIFICATION_TYPE = [
        self::NOTIFICATION_TYPE_APPLICATION=> 'Pendaftaran',
        self::NOTIFICATION_TYPE_RESULT=> 'Pengumuman',
        self::NOTIFICATION_TYPE_OTHER => 'Lainnya',
    ];

    const NOTIFICATION_LINK = [
        self::NOTIFICATION_TYPE_APPLICATION => 'pendaftaran_beasiswa',
        self::NOTIFICATION_TYPE_RESULT => 'pengumuman_beasiswa',
        self::NOTIFICATION_TYPE_OTHER => 'settings',
    ];
}
