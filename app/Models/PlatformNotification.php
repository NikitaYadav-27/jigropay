<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatformNotification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'sent_by', 'title', 'message', 'type',
        'audience', 'target_user_id', 'is_draft', 'sent_at',
    ];

    protected $casts = [
        'is_draft' => 'boolean',
        'sent_at'  => 'datetime',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sent_by');
    }

    public function targetUser()
    {
        return $this->belongsTo(User::class, 'target_user_id');
    }

    public function reads()
    {
        return $this->hasMany(NotificationRead::class, 'notification_id');
    }
}
